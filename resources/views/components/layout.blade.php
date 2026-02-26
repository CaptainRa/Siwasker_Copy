<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
</head>
<body class="h-full bg-background-secondaryBg">

  <div class="flex justify-between items-center w-full">
    {{-- Header --}}
    <x-header>{{$title}}</x-header>

      {{-- navbar --}}
      <x-nav-bar> </x-nav-bar>

      {{-- sidebar --}}
      <x-side-bar>
        @if (Auth::user ()->role=='pengawas')
          <li>
            <x-nav-link 
              href="{{ url('/rencana-kerja') }}"
              :active="Str::contains (url()->current(),'/rencana-kerja')">

              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains(url()->current(), '/rencana-kerja') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" 
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                      width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                      <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Rencana Kerja</span>
              </div>
            </x-nav-link>
          </li>
          <li>
            <x-nav-link 
              href="{{ url('/laporan-kerja') }}" 
              :active="Str::contains (url()->current(),'/laporan-kerja')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains(url()->current(), '/laporan-kerja') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Laporan Kerja</span>
              </div>
            </x-nav-link>
          </li>
          <li>
            <x-nav-link 
              href="{{ url('/jadwal-kerja') }}" 
              :active="Str::contains (url()->current(), '/jadwal-kerja')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains(url()->current(), '/jadwal-kerja') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Jadwal Kerja</span>
              </div>
            </x-nav-link>
          </li>
        @elseif (Auth::user ()->role=='kasat')
          <li>
            <x-nav-link 
              href="{{ url('/rencana-kerja-pengawas-kasat')}}" 
              :active="Str::contains (url()->current(), '/rencana-kerja-pengawas-kasat')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains (url()->current(), '/rencana-kerja-pengawas-kasat') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Rencana Kerja Pengawas</span>
              </div>
            </x-nav-link>
            
          </li>
          <li>
            <x-nav-link 
              href="{{ url('/aduan-kasat')}}" 
              :active="Str::contains (url()->current(), '/aduan-kasat')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains (url()->current(), '/aduan-kasat') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11 4a1 1 0 0 0-1 1v10h10.459l.522-3H16a1 1 0 1 1 0-2h5.33l.174-1H16a1 1 0 1 1 0-2h5.852l.117-.67v-.003A1.983 1.983 0 0 0 20.06 4H11ZM9 18c0-.35.06-.687.17-1h11.66c.11.313.17.65.17 1v1a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1v-1Zm-6.991-7a17.8 17.8 0 0 0 .953 6.1c.198.54 1.61.9 2.237.9h1.34c.17 0 .339-.032.495-.095a1.24 1.24 0 0 0 .41-.27c.114-.114.2-.25.254-.396a1.01 1.01 0 0 0 .055-.456l-.242-2.185a1.073 1.073 0 0 0-.395-.71 1.292 1.292 0 0 0-.819-.286H5.291c-.12-.863-.17-1.732-.145-2.602-.024-.87.024-1.74.145-2.602H6.54c.302 0 .594-.102.818-.286a1.07 1.07 0 0 0 .396-.71l.24-2.185a1.01 1.01 0 0 0-.054-.456 1.088 1.088 0 0 0-.254-.397 1.223 1.223 0 0 0-.41-.269A1.328 1.328 0 0 0 6.78 4H4.307c-.3-.001-.592.082-.838.238a1.335 1.335 0 0 0-.531.634A17.127 17.127 0 0 0 2.008 11Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Aduan</span>
              </div>
            </x-nav-link>
          </li>
          <li>
            <x-nav-link 
              href="{{ url('/laporan-kerja-pengawas')}}" 
              :active="Str::contains (url()->current(), '/laporan-kerja-pengawas')">

              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains (url()->current(), '/laporan-kerja-pengawas') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Laporan Kerja Pengawas</span>
              </div>
            </x-nav-link>
          </li>
          <li>
            <x-nav-link 
              href="{{ url('/jadwal-kerja-pengawas-kasat')}}" 
              :active="Str::contains(url()->current(), '/jadwal-kerja-pengawas-kasat')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains(url()->current(), '/jadwal-kerja-pengawas-kasat') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Jadwal Kerja Pengawas</span>
              </div>
            </x-nav-link>
          </li>
          <li>
            <x-nav-link 
              href="{{ url('/daftar-pegawai')}}" 
              :active="Str::contains(url()->current(), '/daftar-pegawai')">
              
              <div class="flex items-center space-x-2">
                <svg class="w-6 h-6 {{ Str::contains(url()->current(), '/daftar-pengawas') ? 'text-black' : 'text-white group-hover:text-black dark:text-white'}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                </svg>                 
                <span>Daftar Pegawai</span>
              </div>
            </x-nav-link>
          </li>
        @elseif (Auth::user()->role=='tu')
          <li>
            <x-nav-link 
              href="{{url('/tu-daftar-rencana-kerja')}}" 
              :active="Str::contains(url()->current(), '/tu-daftar-rencana-kerja')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ url()->current() === url('/tu-daftar-rencana-kerja') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Rencana Kerja Pengawas</span>
              </div>
            </x-nav-link>
          </li>
          <li>
            <x-nav-link 
              href="{{url('/aduan')}}" 
              :active="Str::contains(url()->current(), '/aduan')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains(url()->current(), '/aduan') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11 4a1 1 0 0 0-1 1v10h10.459l.522-3H16a1 1 0 1 1 0-2h5.33l.174-1H16a1 1 0 1 1 0-2h5.852l.117-.67v-.003A1.983 1.983 0 0 0 20.06 4H11ZM9 18c0-.35.06-.687.17-1h11.66c.11.313.17.65.17 1v1a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1v-1Zm-6.991-7a17.8 17.8 0 0 0 .953 6.1c.198.54 1.61.9 2.237.9h1.34c.17 0 .339-.032.495-.095a1.24 1.24 0 0 0 .41-.27c.114-.114.2-.25.254-.396a1.01 1.01 0 0 0 .055-.456l-.242-2.185a1.073 1.073 0 0 0-.395-.71 1.292 1.292 0 0 0-.819-.286H5.291c-.12-.863-.17-1.732-.145-2.602-.024-.87.024-1.74.145-2.602H6.54c.302 0 .594-.102.818-.286a1.07 1.07 0 0 0 .396-.71l.24-2.185a1.01 1.01 0 0 0-.054-.456 1.088 1.088 0 0 0-.254-.397 1.223 1.223 0 0 0-.41-.269A1.328 1.328 0 0 0 6.78 4H4.307c-.3-.001-.592.082-.838.238a1.335 1.335 0 0 0-.531.634A17.127 17.127 0 0 0 2.008 11Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Aduan</span>
              </div>
            </x-nav-link>
          </li>
          <li>
            <x-nav-link 
              href="{{ url('/jadwal-kerja-pengawas')}}" 
              :active="Str::contains(url()->current(), '/jadwal-kerja-pengawas')">
              
              <div class="flex items-center space-x-2">
                  <svg class="w-6 h-6 {{ Str::contains(url()->current(), '/jadwal-kerja-pengawas') ? 'text-black' : 'text-white group-hover:text-black dark:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"/>
                  </svg> 
                  <span>Jadwal Kerja Pengawas</span>
              </div>
            </x-nav-link>
          </li>
        @endif
      </x-side-bar>

  </div>

  {{-- Main Content --}}
  <main class="pl-4 md:ml-64 h-auto pt-19 pr-4">
    
      {{$slot}}

  </main>

 <script>
  document.addEventListener('DOMContentLoaded', () => {
      const toggleButton = document.getElementById('sidebar-toggle');
      const sidebar = document.getElementById('default-sidebar');

      toggleButton.addEventListener('click', () => {
          // Toggle the sidebar visibility
          if (sidebar.classList.contains('-translate-x-full')) {
              sidebar.classList.remove('-translate-x-full');  // Show sidebar
          } else {
              sidebar.classList.add('-translate-x-full');  // Hide sidebar
          }
      });
  });
</script>
</body>