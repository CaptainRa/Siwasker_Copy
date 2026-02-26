{{-- sidebar --}}
<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
    <div class="overflow-y-auto py-5 px-3 h-full bg-background-primaryBg border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-tr-3xl rounded-br-3xl">
        <!-- Tambahkan logo dan tulisan instansi -->
        <div class="flex items-center mb-5">
          <img src="{{ asset('image/logo_siwasker.png') }}" alt="Logo Pemprov" class="w-12 h-12 mr-1 mb-10">
          <div>
              <h1 class="text-white text-lg font-semibold">SIWASKER</h1>
              <p class="text-white text-sm">Sistem Informasi</p>
              <p class="text-white text-sm">Satuan Pengawasan Ketenagakerjaan Wilayah Semarang</p>
          </div>
      </div>

        <!-- Menu sidebar -->
        <ul class="space-y-2">
            <li>
              <x-nav-link 
                  href="{{ route(auth()->user()->role . '.dashboard') }}" 
                  :active="url()->current() === route(auth()->user()->role . '.dashboard')">
                  <div class="flex items-center space-x-2">
                      <svg class="w-6 h-6 {{ url()->current() === route(auth()->user()->role . '.dashboard') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" 
                          aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                          width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M5 3a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5Zm14 18a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4ZM5 11a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H5Zm14 2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4Z"/>
                      </svg> 
                      <span>Dashboard</span>
                  </div>
              </x-nav-link>
            </li>
            {{$slot}}
        </ul>
    </div>
    <div class=" absolute bottom-0 justify-start p-4 space-x-4 w-full lg:flex z-20 border-r border-gray-200 dark:border-gray-700">
      <ul class="space-y-2">
        <li>
          <a href="/logout" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-white group-hover:text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
            </svg>
            <span class="ml-3 text-white group-hover:text-black">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
</aside>