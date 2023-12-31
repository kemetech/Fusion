@props(['item'])
<td class="px-4 py-3">
    <div class="flex items-center text-sm">
      <!-- Avatar with inset shadow -->
      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block" >
        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true" ></div>
      </div>
      <div> <p class="font-semibold">Hans Burger</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">
            {{$item}}
        </p>
      </div>
    </div>
  </td>