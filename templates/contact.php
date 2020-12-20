<?php $this->title = "Contact"; ?>
<h3 class="text-center py-4 alert alert-primary">Contact</h3>

<form id="contact">
  <div class="form-group">
    <label for="title_request">Titre</label>
    <input type="text" class="form-control" id="title_request" placeholder="Entrer le titre de votre message ici..">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre email.</small>
    <label for="exampleFormControlTextarea1">Votre message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Entrer votre message ici.."></textarea>
</form>