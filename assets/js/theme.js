document.addEventListener("DOMContentLoaded", function () {

	/* ================================================================
	   NAVIGATION — hamburger toggle (mobile)
	   ================================================================ */
	var navToggle = document.getElementById("bl-nav-toggle");
	var mainNav   = document.getElementById("bl-main-nav");

	var scrollY = 0; /* remembers scroll position while nav is open */

	function blToggleBodyLock(lock) {
		if (lock) {
			scrollY = window.pageYOffset;
			document.body.classList.add("bl-nav-open");
			document.body.style.top = "-" + scrollY + "px";
		} else {
			document.body.classList.remove("bl-nav-open");
			document.body.style.top = "";
			window.scrollTo(0, scrollY);
		}
	}

	function blCloseAllSubs() {
		document.querySelectorAll(".bl-has-sub.is-open").forEach(function (item) {
			item.classList.remove("is-open");
			var btn = item.querySelector(".bl-nav-link");
			if (btn) btn.setAttribute("aria-expanded", "false");
		});
	}

	/* The <nav> lives inside WordPress's sticky header wrapper which creates
	   a stacking context (position:sticky + z-index:100). A position:fixed
	   child is trapped inside that context. To escape it, we move the <nav>
	   to <body> when opening, and move it back when closing. */
	var navOriginalParent = mainNav ? mainNav.parentNode : null;
	var navOriginalNext   = mainNav ? mainNav.nextElementSibling : null;

	function blOpenNav() {
		/* Move nav out of header stacking context → direct child of body */
		document.body.appendChild(mainNav);

		var navH = document.getElementById("site-nav") ? document.getElementById("site-nav").getBoundingClientRect().bottom : 60;
		mainNav.style.cssText = "display:flex;position:fixed;top:" + navH + "px;left:0;right:0;bottom:0;background:#fff;flex-direction:column;align-items:stretch;justify-content:flex-start;overflow-y:auto;-webkit-overflow-scrolling:touch;z-index:99999;padding:0;border-top:1px solid #C8E4D0;";
		mainNav.classList.add("is-open");
		navToggle.setAttribute("aria-expanded", "true");
		blToggleBodyLock(true);
	}

	function blCloseNav() {
		mainNav.style.cssText = "";
		mainNav.classList.remove("is-open");
		navToggle.setAttribute("aria-expanded", "false");
		blToggleBodyLock(false);
		blCloseAllSubs();
		/* Move nav back inside header */
		if (navOriginalParent) {
			if (navOriginalNext) {
				navOriginalParent.insertBefore(mainNav, navOriginalNext);
			} else {
				navOriginalParent.appendChild(mainNav);
			}
		}
	}

	if (navToggle && mainNav) {
		navToggle.addEventListener("click", function () {
			if (mainNav.classList.contains("is-open")) {
				blCloseNav();
			} else {
				blOpenNav();
			}
		});
		document.addEventListener("click", function (e) {
			if (!mainNav.contains(e.target) && !navToggle.contains(e.target)) {
				if (mainNav.classList.contains("is-open")) blCloseNav();
			}
		});
		document.addEventListener("keydown", function (e) {
			if (e.key === "Escape" && mainNav.classList.contains("is-open")) {
				blCloseNav();
				navToggle.focus();
			}
		});
		/* Release lock if user resizes past the mobile breakpoint while nav is open */
		window.addEventListener("resize", function () {
			if (window.innerWidth > 900 && mainNav.classList.contains("is-open")) {
				blCloseNav();
			}
		});
	}

	/* Mobile sub-menu accordion */
	document.querySelectorAll(".bl-has-sub > .bl-nav-link").forEach(function (btn) {
		btn.addEventListener("click", function (e) {
			if (window.innerWidth > 900) return;
			e.preventDefault();
			e.stopPropagation();
			var item = this.closest(".bl-has-sub");
			/* Close all other open dropdowns first */
			document.querySelectorAll(".bl-has-sub.is-open").forEach(function (other) {
				if (other !== item) {
					other.classList.remove("is-open");
					var otherBtn = other.querySelector(".bl-nav-link");
					if (otherBtn) otherBtn.setAttribute("aria-expanded", "false");
				}
			});
			var isOpen = item.classList.toggle("is-open");
			this.setAttribute("aria-expanded", isOpen ? "true" : "false");
		});
	});

	/* ================================================================
	   SMOOTH SCROLL — anchor links
	   ================================================================ */
	document.querySelectorAll('a[href^="#"]').forEach(function (link) {
		link.addEventListener("click", function (e) {
			var id = this.getAttribute("href");
			if (!id || id === "#") return;
			var target = document.querySelector(id);
			if (!target) return;
			e.preventDefault();
			target.scrollIntoView({ behavior: "smooth", block: "start" });
		});
	});

	/* ================================================================
	   TAB SWITCHING — homepage and product panels
	   ================================================================ */
	document.querySelectorAll("[data-bl-tab]").forEach(function (btn) {
		btn.addEventListener("click", function () {
			var targetId = this.getAttribute("data-bl-tab");
			var panel = document.getElementById(targetId);
			if (!panel) return;

			var bar = this.closest(".bl-tab-bar");
			if (bar) {
				bar.querySelectorAll(".bl-tab-btn").forEach(function (b) {
					b.classList.remove("active");
					b.setAttribute("aria-selected", "false");
				});
			}

			var section = this.closest(".bl-section") || this.closest("section");
			if (section) {
				section.querySelectorAll(".bl-tab-panel").forEach(function (p) {
					p.classList.remove("active");
					p.setAttribute("hidden", "hidden");
				});
			}

			this.classList.add("active");
			this.setAttribute("aria-selected", "true");
			panel.classList.add("active");
			panel.removeAttribute("hidden");
		});
	});

	/* ================================================================
	   LOCALSTORAGE CART — persistent cart shared across pages
	   ================================================================ */
	var BL_CART_KEY = "boundless_cart";

	/* Product catalogue (extend as new products are added) */
	var blProducts = {
		original:   { name: "BOUNDLESS Original\u2122",  size: "250 ml",   price: 12.99, currency: "\u00A3", type: "No-Chew Deterrent Spray",       tags: ["Alcohol-Free","Skin-Safe"] },
		natural:    { name: "BOUNDLESS Natural\u2122",   size: "250 ml",   price: 14.99, currency: "\u00A3", type: "Essential Oil Deterrent Spray",  tags: ["Plant-Based","Eco-Friendly"] },
		hotspot:    { name: "BOUNDLESS 2-in-1\u2122",    size: "250 ml",   price: 16.99, currency: "\u00A3", type: "Hot Spot Treatment + Deterrent", tags: ["Dual-Action","Soothing"] },
		sensitive:  { name: "Sensitive",                  size: "16 fl oz", price: 18.99, currency: "$",      type: "Sensitive Dog Shampoo",          tags: ["Fragrance-Free","Sulfate-Free"] },
		itchrelief: { name: "Itch Relief",                size: "16 fl oz", price: 23.99, currency: "$",      type: "Itch Relief Dog Shampoo",        tags: ["Vet-Grade","Tea Tree-Free"] }
	};

	function blGetCart() {
		try {
			var data = JSON.parse(localStorage.getItem(BL_CART_KEY));
			if (data && typeof data === "object") return data;
		} catch (e) { /* ignore */ }
		return {};
	}

	function blSaveCart(cart) {
		localStorage.setItem(BL_CART_KEY, JSON.stringify(cart));
		blUpdateCartBadge();
	}

	function blCartTotal() {
		var cart = blGetCart();
		var count = 0;
		for (var k in cart) {
			if (cart.hasOwnProperty(k)) count += cart[k];
		}
		return count;
	}

	function blUpdateCartBadge() {
		var count = blCartTotal();
		document.querySelectorAll(".cart-btn").forEach(function (btn) {
			btn.textContent = "Cart (" + count + ")";
		});
	}

	/* Update badge on every page load */
	blUpdateCartBadge();

	/* ================================================================
	   PRODUCT PAGE — Quantity control + Add to Cart
	   ================================================================ */
	var blQty = 1;

	window.blChangeQty = function (delta) {
		blQty = Math.max(1, blQty + delta);
		var display = document.getElementById("bl-qty-display");
		if (display) display.textContent = blQty;
	};

	window.blAddToCart = function () {
		var btn = document.getElementById("bl-add-btn");
		if (!btn) return;

		/* Determine which product from page context (default: original) */
		var productId = btn.getAttribute("data-product") || "original";

		/* Add to localStorage cart */
		var cart = blGetCart();
		cart[productId] = (cart[productId] || 0) + blQty;
		blSaveCart(cart);

		/* Visual feedback */
		var orig = btn.textContent;
		btn.textContent = "\u2713 Added!";
		btn.classList.add("added");
		setTimeout(function () {
			btn.textContent = orig;
			btn.classList.remove("added");
			/* Scroll to checkout options if on same page */
			var checkout = document.getElementById("affiliate-checkout");
			if (checkout) checkout.scrollIntoView({ behavior: "smooth", block: "start" });
		}, 1600);
	};

	/* ================================================================
	   CART PAGE — Render cart items from localStorage
	   ================================================================ */
	var cartItemsEl = document.querySelector(".bl-cart-items");
	var cartEmptyEl = document.getElementById("bl-cart-empty");

	if (cartItemsEl) {
		var cart = blGetCart();
		var hasItems = false;

		/* Remove the static placeholder item */
		var staticItem = document.getElementById("bl-cart-item-original");
		if (staticItem) staticItem.remove();

		for (var pid in cart) {
			if (!cart.hasOwnProperty(pid) || !blProducts[pid]) continue;
			if (cart[pid] < 1) continue;
			hasItems = true;
			var prod = blProducts[pid];

			var item = document.createElement("div");
			item.className = "bl-cart-item";
			item.id = "bl-cart-item-" + pid;
			var tagsHtml = '';
			prod.tags.forEach(function (t) { tagsHtml += '<span class="bl-cart-tag">' + t + '</span>'; });
			item.innerHTML =
				'<div class="bl-cart-item-visual">\ud83c\udf3f</div>' +
				'<div class="bl-cart-item-info">' +
					'<div class="bl-cart-item-name">' + prod.name + '</div>' +
					'<div class="bl-cart-item-sub">' + prod.type + ' \u00b7 ' + prod.size + '</div>' +
					'<div class="bl-cart-item-tags">' + tagsHtml + '</div>' +
				'</div>' +
				'<div class="bl-cart-item-controls">' +
					'<div class="bl-cart-qty">' +
						'<button class="bl-qty-btn" aria-label="Decrease" onclick="blCartQty(\'' + pid + '\', -1)">\u2212</button>' +
						'<span class="bl-qty-val" id="bl-cart-qty-' + pid + '">' + cart[pid] + '</span>' +
						'<button class="bl-qty-btn" aria-label="Increase" onclick="blCartQty(\'' + pid + '\', 1)">+</button>' +
					'</div>' +
					'<div class="bl-cart-item-price" id="bl-cart-price-' + pid + '">' + prod.currency + (cart[pid] * prod.price).toFixed(2) + '</div>' +
					'<button class="bl-cart-remove" onclick="blCartRemove(\'' + pid + '\')">\u00d7 Remove</button>' +
				'</div>';
			cartItemsEl.insertBefore(item, cartEmptyEl);
		}

		if (!hasItems && cartEmptyEl) {
			cartEmptyEl.classList.add("is-visible");
		}

		blCartUpdateTotals();
	}

	/* Cart page — quantity change */
	window.blCartQty = function (product, delta) {
		var cart = blGetCart();
		if (!cart[product]) return;
		cart[product] = Math.max(1, cart[product] + delta);
		blSaveCart(cart);

		var prod = blProducts[product];
		if (!prod) return;

		var qtyEl = document.getElementById("bl-cart-qty-" + product);
		if (qtyEl) qtyEl.textContent = cart[product];

		var priceEl = document.getElementById("bl-cart-price-" + product);
		if (priceEl) priceEl.textContent = prod.currency + (cart[product] * prod.price).toFixed(2);

		blCartUpdateTotals();
	};

	/* Cart page — remove item */
	window.blCartRemove = function (product) {
		var cart = blGetCart();
		delete cart[product];
		blSaveCart(cart);

		var el = document.getElementById("bl-cart-item-" + product);
		if (el) el.remove();

		/* Check if cart is now empty */
		var remaining = blGetCart();
		var empty = true;
		for (var k in remaining) {
			if (remaining.hasOwnProperty(k)) { empty = false; break; }
		}
		if (empty && cartEmptyEl) cartEmptyEl.classList.add("is-visible");

		blCartUpdateTotals();
	};

	/* Cart page — recalculate totals */
	function blCartUpdateTotals() {
		var cart = blGetCart();
		var subtotal = 0;
		for (var pid in cart) {
			if (cart.hasOwnProperty(pid) && blProducts[pid]) {
				subtotal += cart[pid] * blProducts[pid].price;
			}
		}
		var subEl = document.getElementById("bl-cart-subtotal");
		var totEl = document.getElementById("bl-cart-total");
		var shipEl = document.getElementById("bl-cart-shipping");
		if (subEl) subEl.textContent = "\u00a3" + subtotal.toFixed(2);
		if (totEl) totEl.textContent = "\u00a3" + subtotal.toFixed(2);
		if (shipEl) shipEl.textContent = subtotal >= 35 ? "Free" : "Calculated at checkout";
	}

	/* ================================================================
	   PRODUCT SHOWCASE SLIDER — pixel-accurate scroll with arrows,
	   dots, auto-advance, and responsive perView.
	   ================================================================ */
	var sliderIndex = 0;
	var sliderTrack = document.getElementById("bl-showcase-track");
	var sliderDots  = document.getElementById("bl-showcase-dots");

	function blSliderPerView() {
		var w = window.innerWidth;
		if (w <= 599) return 1;
		if (w <= 900) return 2;
		return 3;
	}

	function blSliderGo(index) {
		if (!sliderTrack) return;
		var cards = sliderTrack.querySelectorAll(".bl-showcase-card");
		if (!cards.length) return;

		var total   = cards.length;
		var perView = blSliderPerView();
		var maxIdx  = Math.max(0, total - perView);
		sliderIndex = Math.max(0, Math.min(index, maxIdx));

		/* Calculate pixel offset using the actual card position.
		   This is accurate regardless of gap, padding, or flex sizing. */
		var offset = 0;
		if (sliderIndex > 0 && cards[sliderIndex]) {
			offset = cards[sliderIndex].offsetLeft - cards[0].offsetLeft;
		}
		sliderTrack.style.transform = "translateX(-" + offset + "px)";

		/* Update dots */
		if (sliderDots) {
			sliderDots.querySelectorAll(".bl-showcase-dot").forEach(function (d, i) {
				d.classList.toggle("active", i === sliderIndex);
			});
		}

		/* Update arrow visibility */
		var prevBtn = document.querySelector(".bl-showcase-prev");
		var nextBtn = document.querySelector(".bl-showcase-next");
		if (prevBtn) prevBtn.style.opacity = sliderIndex <= 0 ? "0.3" : "1";
		if (nextBtn) nextBtn.style.opacity = sliderIndex >= maxIdx ? "0.3" : "1";
	}

	window.blSliderPrev = function () { blSliderGo(sliderIndex - 1); };
	window.blSliderNext = function () { blSliderGo(sliderIndex + 1); };

	/* Dot click */
	if (sliderDots) {
		sliderDots.querySelectorAll(".bl-showcase-dot").forEach(function (dot, i) {
			dot.addEventListener("click", function () { blSliderGo(i); });
		});
	}

	/* Recalculate on resize */
	if (sliderTrack) {
		window.addEventListener("resize", function () { blSliderGo(sliderIndex); });
	}

	/* Auto-advance every 5 seconds */
	if (sliderTrack) {
		setInterval(function () {
			var total   = sliderTrack.querySelectorAll(".bl-showcase-card").length;
			var maxIdx  = Math.max(0, total - blSliderPerView());
			blSliderGo(sliderIndex >= maxIdx ? 0 : sliderIndex + 1);
		}, 5000);

		/* Initial arrow state */
		blSliderGo(0);

		/* Touch/swipe support for mobile */
		var touchStartX = 0;
		var touchDiff    = 0;
		sliderTrack.addEventListener("touchstart", function (e) {
			touchStartX = e.touches[0].clientX;
			touchDiff = 0;
		}, { passive: true });
		sliderTrack.addEventListener("touchmove", function (e) {
			touchDiff = e.touches[0].clientX - touchStartX;
		}, { passive: true });
		sliderTrack.addEventListener("touchend", function () {
			if (touchDiff > 50)       blSliderGo(sliderIndex - 1);  /* swipe right = prev */
			else if (touchDiff < -50) blSliderGo(sliderIndex + 1);  /* swipe left = next */
		});
	}

	/* (Product switcher removed — replaced by category dropdown menus) */

	/* ================================================================
	   PRODUCT HERO TAB LINKS — toggle active class on click
	   ================================================================ */
	document.querySelectorAll(".bl-product-tab-link").forEach(function (link) {
		link.addEventListener("click", function () {
			document.querySelectorAll(".bl-product-tab-link").forEach(function (l) {
				l.classList.remove("active");
			});
			this.classList.add("active");
		});
	});

});
