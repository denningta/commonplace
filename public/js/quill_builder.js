// <!-- Initialize Quill editor -->
  var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      ['bold', 'italic', 'underline', 'strike'],
      ['link', 'blockquote', 'code-block'],
      [{ list: 'ordered' }, { list: 'bullet' }],
      [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
      [{ 'font': [] }],
      [{ 'align': [] }]
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'
});

var form = document.querySelector('#card');
form.onsubmit = function () {
  // Populate hidden form on submit
  var body = document.querySelector('input[name=body]');
  body.value = (quill.root.innerHTML);

  console.log("Submitted", $(form).serialize(), $(form).serializeArray());
};