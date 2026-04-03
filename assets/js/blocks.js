(function (wp) {
	const { __ } = wp.i18n;
	const { registerBlockType } = wp.blocks;
	const { createElement: el, Fragment } = wp.element;
	const { InspectorControls, RichText, useBlockProps } = wp.blockEditor;
	const { PanelBody, TextControl, TextareaControl, SelectControl } = wp.components;
	const { registerPlugin } = wp.plugins || {};
	const { PluginDocumentSettingPanel } = wp.editor || wp.editPost || {};
	const { useSelect, useDispatch } = wp.data || {};

	/* ================================================================
	   EDITOR SIDEBAR — Per-page colour scheme selector
	   Requirement: "Background theme can be changed per page"
	   ================================================================ */
	if (registerPlugin && PluginDocumentSettingPanel && useSelect && useDispatch) {
		registerPlugin("boundless-color-scheme", {
			render: function () {
				var postType = useSelect(function (select) {
					return select("core/editor").getCurrentPostType();
				});
				if (postType !== "page") return null;

				var scheme = useSelect(function (select) {
					return select("core/editor").getEditedPostAttribute("meta").boundless_color_scheme || "default";
				});
				var editPost = useDispatch("core/editor").editPost;

				return el(
					PluginDocumentSettingPanel,
					{ name: "boundless-color-scheme", title: __("Page Colour Scheme", "boundless-native-theme"), className: "bl-color-scheme-panel" },
					el(SelectControl, {
						label: __("Background Theme", "boundless-native-theme"),
						value: scheme,
						options: [
							{ label: "Default (Dark Green)", value: "default" },
							{ label: "Original\u2122 (Forest Green)", value: "original" },
							{ label: "Natural\u2122 (Leaf Green)", value: "natural" },
							{ label: "Hot Spot\u2122 (Teal)", value: "hotspot" },
							{ label: "Light (Cream / White)", value: "light" }
						],
						onChange: function (val) {
							editPost({ meta: { boundless_color_scheme: val } });
						}
					}),
					el("p", { style: { fontSize: "12px", color: "#888" } },
						"Changes the hero background and accent colours for this page."
					)
				);
			}
		});
	}

	registerBlockType("boundless/affiliate-checkout", {
		apiVersion: 2,
		title: __("Affiliate Checkout", "boundless-native-theme"),
		icon: "cart",
		category: "widgets",
		attributes: {
			title: { type: "string", default: "Checkout Options" },
			description: { type: "string", default: "Choose your preferred store to purchase." },
			amazonUrl: { type: "string", default: "#" },
			walmartUrl: { type: "string", default: "#" },
			shopUrl: { type: "string", default: "#" },
			shopLabel: { type: "string", default: "Official Shop" },
			sectionId: { type: "string", default: "" }
		},
		edit: function (props) {
			const { attributes, setAttributes } = props;
			const blockProps = useBlockProps({ className: "boundless-editor-affiliate" });

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __("Affiliate Links", "boundless-native-theme"), initialOpen: true },
						el(TextControl, {
							label: __("Amazon URL", "boundless-native-theme"),
							value: attributes.amazonUrl,
							onChange: (v) => setAttributes({ amazonUrl: v })
						}),
						el(TextControl, {
							label: __("Walmart URL", "boundless-native-theme"),
							value: attributes.walmartUrl,
							onChange: (v) => setAttributes({ walmartUrl: v })
						}),
						el(TextControl, {
							label: __("Third Store URL", "boundless-native-theme"),
							value: attributes.shopUrl,
							onChange: (v) => setAttributes({ shopUrl: v })
						}),
						el(TextControl, {
							label: __("Third Store Label", "boundless-native-theme"),
							value: attributes.shopLabel,
							onChange: (v) => setAttributes({ shopLabel: v })
						}),
						el(TextControl, {
							label: __("Optional Section ID", "boundless-native-theme"),
							help: __("Example: affiliate-checkout", "boundless-native-theme"),
							value: attributes.sectionId,
							onChange: (v) => setAttributes({ sectionId: v })
						})
					)
				),
				el(
					"div",
					blockProps,
					el(RichText, {
						tagName: "h3",
						value: attributes.title,
						allowedFormats: [],
						onChange: (v) => setAttributes({ title: v }),
						placeholder: __("Add block title", "boundless-native-theme")
					}),
					el(RichText, {
						tagName: "p",
						value: attributes.description,
						allowedFormats: [],
						onChange: (v) => setAttributes({ description: v }),
						placeholder: __("Add supporting text", "boundless-native-theme")
					}),
					el(
						"div",
						{ className: "boundless-editor-button-row" },
						el("button", { type: "button" }, "Amazon"),
						el("button", { type: "button" }, "Walmart"),
						el("button", { type: "button" }, attributes.shopLabel || "Official Shop")
					)
				)
			);
		},
		save: function () {
			return null;
		}
	});

	registerBlockType("boundless/product-highlights", {
		apiVersion: 2,
		title: __("Product Highlights", "boundless-native-theme"),
		icon: "star-filled",
		category: "widgets",
		attributes: {
			title: { type: "string", default: "Product Highlights" },
			items: {
				type: "array",
				default: ["Alcohol-Free Formula", "Skin-Safe on Contact", "Triple Scent Barrier", "pH Balanced 5.5-6.0"]
			}
		},
		edit: function (props) {
			const { attributes, setAttributes } = props;
			const blockProps = useBlockProps({ className: "boundless-editor-highlights" });
			const listValue = (attributes.items || []).join("\n");

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __("Highlight Items", "boundless-native-theme"), initialOpen: true },
						el(TextareaControl, {
							label: __("One highlight per line", "boundless-native-theme"),
							value: listValue,
							onChange: (v) =>
								setAttributes({
									items: v
										.split("\n")
										.map((s) => s.trim())
										.filter(Boolean)
								})
						})
					)
				),
				el(
					"div",
					blockProps,
					el(RichText, {
						tagName: "h4",
						value: attributes.title,
						onChange: (v) => setAttributes({ title: v }),
						allowedFormats: [],
						placeholder: __("Highlights heading", "boundless-native-theme")
					}),
					el(
						"div",
						{ className: "boundless-editor-pill-row" },
						...(attributes.items || []).map((item, idx) =>
							el("span", { key: idx, className: "boundless-editor-pill" }, item)
						)
					)
				)
			);
		},
		save: function () {
			return null;
		}
	});
	registerBlockType("boundless/subcategory-list", {
		apiVersion: 2,
		title: __("Subcategory List", "boundless-native-theme"),
		icon: "category",
		category: "widgets",
		attributes: {
			heading: { type: "string", default: "Subcategories" }
		},
		edit: function (props) {
			var attributes = props.attributes;
			var setAttributes = props.setAttributes;
			var blockProps = useBlockProps({ className: "boundless-editor-subcategories" });

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __("Settings", "boundless-native-theme"), initialOpen: true },
						el(TextControl, {
							label: __("Section Heading", "boundless-native-theme"),
							value: attributes.heading,
							onChange: function (v) { setAttributes({ heading: v }); }
						})
					)
				),
				el(
					"div",
					blockProps,
					el("h4", null, attributes.heading || "Subcategories"),
					el("p", { style: { color: "#888", fontSize: "13px" } },
						"Child categories will be listed here automatically on the frontend."
					),
					el(
						"div",
						{ className: "boundless-editor-pill-row" },
						el("span", { className: "boundless-editor-pill" }, "Category A"),
						el("span", { className: "boundless-editor-pill" }, "Category B"),
						el("span", { className: "boundless-editor-pill" }, "Category C")
					)
				)
			);
		},
		save: function () {
			return null;
		}
	});

})(window.wp);
