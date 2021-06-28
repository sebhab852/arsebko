<?php
    if(isset($_GET["postID"])){
        $postid = $_GET["postID"];
    }
?>
<script> 
    showSinglePost(<?php echo json_encode($postid); ?>);
</script>
<section id="singlePost" class="sectionpadding">
    <div id="mainContainerForSinglePost" class="container">
        
    </div>
</section>