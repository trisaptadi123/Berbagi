<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
   
<script>
  $('#summernotes').summernote({
    focus: true, 
    placeholder: 'Masukan teks disini',
    tabsize: 2,
    height: 320,
    codemirror: { // codemirror options
      theme: 'monokai'
    },

    blockquoteBreakingLevel: 0,
    callbacks: { onPaste: function (e) { var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text'); e.preventDefault(); document.execCommand('insertText', false, bufferText); } },
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
    
    
  });

</script>