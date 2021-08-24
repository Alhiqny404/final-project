function modalku(target, effect) {
  var modal = new Custombox.modal({
    content: {
      target: target,
      effect: effect
    }
  });
  modal.open();
}

function resetForm(idForm) {
  $(idForm)[0].reset();
}

function alertCenter(title, msg, type) {
  Swal.fire(
    title,
    msg,
    type
  )
}