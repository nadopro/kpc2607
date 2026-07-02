<?php
// log2.php
?>

<div class="text-center my-5">

    <button type="button"
            class="btn btn-primary btn-lg"
            onclick="openVisualFullScreen();">
        시각화
    </button>

</div>

<script>
function openVisualFullScreen() {
    const win = window.open(
        "visual.php",
        "visualWindow",
        "width=" + screen.width + ",height=" + screen.height + ",left=0,top=0,fullscreen=yes"
    );

    if (win) {
        win.focus();
    }
}
</script>