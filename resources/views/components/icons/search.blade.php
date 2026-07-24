@props(['class' => 'w-5 h-5'])

<svg xmlns="http://www.w3.org/2000/svg"
     fill="none"
     viewBox="0 0 24 24"
     stroke-width="1.8"
     stroke="currentColor"
     {{ $attributes->merge(['class'=>$class]) }}>

    <path stroke-linecap="round"
          stroke-linejoin="round"
          d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/>

</svg>