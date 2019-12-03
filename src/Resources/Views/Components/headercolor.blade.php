@php
    if ($headerColor == 'white'){
        $styleColor = 'white';
        $styleNav = 'navbar-light';
    }elseif($headerColor == 'light'){
        $styleColor = '#F2F2F2';
        $styleNav = 'navbar-light';
    }elseif($headerColor == 'dark'){
        $styleColor = '#1C1C1C';
        $styleNav = 'navbar-dark';
    }elseif($headerColor == strtolower('navyblue')){
        $styleColor = '#0A122A';
        $styleNav = 'navbar-dark';
    }elseif($headerColor == strtolower('bordeaux')){
        $styleColor = '#B40404';
        $styleNav = 'navbar-dark';
    }elseif($headerColor == 'black'){
        $navBgColor = '#000';
        $styleNav = 'navbar-dark';
        $styleColor = 'black';
    }else{
        $styleNav = 'navbar-light';
        $styleColor = '#F2F2F2';
    }
@endphp