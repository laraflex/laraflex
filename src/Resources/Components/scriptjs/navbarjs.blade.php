@if (!empty($objetojs) && $objetojs->component == 'navbarjs')
<script type="text/javascript">

const Menu = document.getElementById("mainmenu");

Menu.addEventListener("animationstart", () => {

    Menu.style.backgroundColor = "#000000";
});
</script>
@endif

{{--
if (window.scrollY > 60) {
                mMainMenu.style.backgroundColor = "#666666"; // Muda para vermelho quando rolar mais de 100px
                mMainMenu.style.color = "#FFFFFF";
            } else {
                mMainMenu.style.backgroundColor = ""; // Volta a ser azul quando rolar menos de 100px
                mMainMenu.style.color = "";
            }
--}}
