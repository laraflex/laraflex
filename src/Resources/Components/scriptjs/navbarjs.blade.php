@if (!empty($objetojs) && $objetojs->component == 'navbarjs')
<script type="text/javascript">
    $(document).ready(function(){
        $( window ).resize(function() {
            $("#navbarDefault").collapse('hide');
        });
        var bgColorCollapse = $("#navbar").css("background");

        $("#navbarDefault").on("show.bs.collapse", function(){
            $("#navbar").css("background","rgb(0,0,0,0.6)");
            $("#navbar").css("padding-bottom","30px");
            $(".navbar-item-link").css("color","#FFFFFF");
            $("#navbar-df").css("padding-bottom","30px");
            $("#navbar-nav-items").css("padding-top","15px");

            $("#navbar").css("padding-bottom","30px");
        });
        $("#navbarDefault").on("hide.bs.collapse", function(){
            $("#navbar").css("background",bgColorCollapse);
            $(".navbar-item-link").css("color","");
            $("#navbar").css("padding-bottom","8px");
            $("#navbar-df").css("padding-bottom","8px");
            $("#navbar-nav-items").css("padding-top","0px");
        });

        var lastScrollTop = 0, delta = 5;
        var bgColorDark =  $(".bg-navbar-dark").css("background");
        var bgColorBright =  $(".bg-navbar-bright").css("background");
        var bgColorPredominant = $(".navbar-plus").css("background");
        var posicaoInicial = $('#content').offset().top
        $(window).scroll(function(){
            var nowScrollTop = $(this).scrollTop();
            if(Math.abs(lastScrollTop - nowScrollTop) >= delta){
                if (nowScrollTop > lastScrollTop){
                    var posicaoScroll = $(document).scrollTop();
                    if (Math.abs(posicaoInicial - 65) < posicaoScroll){
                        $(".bg-navbar-bright").css("background",bgColorPredominant);
                        $(".bg-navbar-dark").css("background",bgColorPredominant);
                    }
                }else{
                    var posicaoScroll = $(document).scrollTop();
                    if (posicaoInicial > posicaoScroll){
                        $(".bg-navbar-dark").css("background",bgColorDark);
                        $(".bg-navbar-bright").css("background",bgColorBright);
                    }
                }
            lastScrollTop = nowScrollTop;
            }
        });
    });
</script>
@endif
