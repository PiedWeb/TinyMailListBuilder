
export function tinyMailListBuilder (form, callback, list = '') {
  fetch(form.action, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
    },
    body:  'email='+form.querySelector('[type=email]').value+'&list='+list
  }).then(function (response) {
    return response.text();
  }).then(function (text, form) {
    callback(text, form);
  });
}
