

// JavaScript Document

if ( screen.width <= 4320) {
    //Aqui cargara un hoja de estilos para las resoluciones mayores a 4320
    document.write('<link rel="stylesheet" type"text/css" href="{{ asset(css/adapter_screen/mayor_4320.css) }}" />');
}else if ( screen.width <= 2160) {
    //Aqui cargara un hoja de estilos para las resoluciones mayores a 2160
    document.write('<link rel="stylesheet" type"text/css" href="/public/css/adapter_screen/mayor_2160.css" />');
}else if ( screen.width <= 1440) {
    //Aqui cargara un hoja de estilos para las resoluciones mayores a 1440
    document.write('<link rel="stylesheet" type"text/css" href="/public/css/adapter_screen/mayor_1440.css" />');
}else if ( screen.width <= 1080) {
    //Aqui cargara un hoja de estilos para las resoluciones mayores a 1080
    document.write('<link rel="stylesheet" type"text/css" href="/public/css/adapter_screen/mayor_1080.css" />');
}else if ( screen.width <= 720) {
    //Aqui cargara un hoja de estilos para las resoluciones 720
    document.write('<link rel="stylesheet" type"text/css" href="/public/css/adapter_screen/mayor_720.css" />');
}else if ( screen.width <= 480) {
    //Aqui cargara un hoja de estilos para las resoluciones menores a 1024
    document.write('<link rel="stylesheet" type"text/css" href="/public/css/adapter_screen/menor_480.css" />');
}else if ( screen.width <= 360) {
    //Aqui cargara un hoja de estilos para las resoluciones menores a 1024
    document.write('<link rel="stylesheet" type"text/css" href="/public/css/adapter_screen/menor_360.css" />');
}else if ( screen.width = 240) {
    //Aqui cargara un hoja de estilos para las resoluciones menores a 1024
    document.write('<link rel="stylesheet" type"text/css" href="/public/css/adapter_screen/menor_240.css" />');
}
