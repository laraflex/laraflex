@if (!empty($objetojs) && $objetojs->component == 'sidebarjs')

<script>
$(".sidebar-dropdown > a").click(function () {
  $(".sidebar-submenu").slideUp(200);
  if (
  $(this).
  parent().
  hasClass("active"))
  {
    $(".sidebar-dropdown").removeClass("active");
    $(this).
    parent().
    removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this).
    next(".sidebar-submenu").
    slideDown(200);
    $(this).
    parent().
    addClass("active");
  }
});

$("#close-sidebar").click(function () {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function () {
  $(".page-wrapper").addClass("toggled");

});

const mButton = document.getElementById("show-sidebar");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 60) {
                mButton.style.backgroundColor = "#666666"; // Muda para vermelho quando rolar mais de 100px
                mButton.style.color = "#FFFFFF";
            } else {
                mButton.style.backgroundColor = ""; // Volta a ser azul quando rolar menos de 100px
                mButton.style.color = "";
            }
        });

</script>
@endif
