ClassicEditor.create(document.getElementById("content"), {
    toolbar: {
        items: [
            "heading",
            "|",
            "fontFamily",
            "fontSize",
            "bold",
            "italic",
            "alignment",
            "removeFormat",
            "|",
            "bulletedList",
            "numberedList",
            "|",
            "indent",
            "outdent",
            "|",
            "insertTable",
            "fontBackgroundColor",
            "fontColor",
            "undo",
            "redo",
            "imageInsert",
            "link",
            "mediaEmbed",
            "codeBlock",
            "blockQuote",
            "horizontalLine",
        ],
    },
    language: "es",
    image: {
        toolbar: ["imageTextAlternative", "imageStyle:full", "imageStyle:side"],
    },
    table: {
        contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"],
    },
    link: {
        addTargetToExternalLinks: true,
        defaultProtocol: "http://",
    },
    mediaEmbed: {
        previewsInData: true,
    },
    licenseKey: "",
})
    .then(function (editor) {
        window.editor = editor;
    })
    .catch(function (err) {
        console.error(err);
    });
