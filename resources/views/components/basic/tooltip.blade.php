@props(['dir' => 'top',
        'tooltip' => null])

       

    <span @class(['absolute hidden  group-hover:flex rounded px-2 py-1 bg-gray-700 text-center max-w-48 text-white text-xs z-10', 
    "bottom-full " => $dir == 'top',
    "top-full " => $dir == 'bottom',
    "right-full " => $dir == 'left',
    "left-full " => $dir == 'right',])
    

    >{{$tooltip}}</span>
