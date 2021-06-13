<section id="posts">
    <div id="new-post-container" class="container rounded">
        <form id="upload-new-post" action="index.php?page=posts" method="POST">
            <label id="label-new-post" for="new-post" class="mt-1 mb-2 ms-1">Einen neuen Beitrag posten</label>
            
            <input id="new-post-title" class="form-control mb-1" new="new-post-title" placeholder="Titel" required>
            <textarea id="new-post-text" class="form-control" name="new-post-text" rows="10" cols="50" placeholder="Schreiben Sie etwas ..." required></textarea>
            
            <input id="submit-new-post" type="submit" class="btn btn-primary mt-2" onclick=uploadPost(<?php echo json_encode($_SESSION['username']); ?>) value="Posten">
        </form>
        <hr><br>
    </div>
    
    <div id="posts-main-container" class="container-fluid mt-4 px-4">
        <!-- <div id="post-container" class="container rounded"> -->
        <!-- </div> -->

		<!-- <div id="post-container" class="container rounded">
            <br>
            <h2>Test Beitrag #1</h2>
            <h6>Autor: Max Mustermann</h6>
            <small>Hochgeladen am: 12.04.2021 - 22:31</small>
            <hr><br>
            <p class="post-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            <br>
        </div>

        <div id="post-container" class="container rounded">
            <br>
            <h2>Test Beitrag #2</h2>
            <h6>Autor: Martina Musterfrau</h6>
            <small>Hochgeladen am: 12.04.2021 - 23:03</small>
            <hr><br>
            <p class="post-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            <br>
        </div>

        <div id="post-container" class="container rounded">
            <br>
            <h2>Test Beitrag #3</h2>
            <h6>Autor: 2Pac</h6>
            <small>Hochgeladen am: 12.04.2021 - 23:10</small>
            <hr><br>
            <p class="post-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            <br>
        </div> -->
    </div>
</section>

<script>
    getAllPostRows();
</script>