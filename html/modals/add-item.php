<?php

require_once '../php/db.php';
(new db())->validate_session();

?>

<div id="modal" class="modal add-modal">
    <form id="modal-form" action="/php/add_menu.php" method="POST" enctype='multipart/form-data'>
        <input type="hidden" name="id" id="item-id" value="">
        <div class="add-column">
            <input id="item-name" required class="add-input" type="text" name="name" placeholder="Item naam">
            <textarea id="item-description" required class="add-textarea" name="description" placeholder="Item beschrijving"></textarea>
            <input id="item-price" required class="add-input" type="number" name="price" step="0.01" placeholder="Prijs">
        </div>

        <div class="add-column">
            <input id="item-image" placeholder="Upload item afbeelding" class="add-image" type="file" name="image"
                   accept="image/png, image/gif, image/jpeg"/>
            <input class="add-submit" type="submit" value="Toevoegen">
        </div>
    </form>
</div>