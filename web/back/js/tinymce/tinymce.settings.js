tinymce.init({
    selector: "textarea",
    body_class: "tinymce-editor",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    style_formats: [
		{title: "Inline", items: [
		  {title: "Gras", icon: "bold", format: "bold"},
		  {title: "Italique", icon: "italic", format: "italic"},
		  {title: "Souligné", icon: "underline", format: "underline"},
		  {title: "Barré", icon: "strikethrough", format: "strikethrough"},
		]},
		{title: "Blocks", items: [
		  {title: "Paragraphe", format: "p"},
		]},
		{title: "Alignment", items: [
		  {title: "Gauche", icon: "alignleft", format: "alignleft"},
		  {title: "Centré", icon: "aligncenter", format: "aligncenter"},
		  {title: "Droit", icon: "alignright", format: "alignright"},
		  {title: "Justifié", icon: "alignjustify", format: "alignjustify"}
		]}
	],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});