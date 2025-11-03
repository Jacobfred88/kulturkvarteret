  <div x-data="{ open: false }" x-cloak>
      <button class="fixed bottom-0 left-0 z-[999] bg-white text-black transition-colors duration-300 ease-out px-4 py-2 uppercase text-[10px] border-t border-r" @click="open = !open">
          <span class="sm:hidden">root</span>
          <span class="hidden sm:block md:hidden">sm</span>
          <span class="hidden md:block lg:hidden">md</span>
          <span class="hidden lg:block xl:hidden">lg</span>
          <span class="hidden xl:block xxl:hidden">xl</span>
          <span class="hidden xxl:block display:hidden">xxl</span>
          <span class="hidden display:block">display</span>
      </button>

      <div class="fixed inset-0 w-full h-screen z-[998] pointer-events-none" x-show="open">
          <div class="container">
              <div class="grid">
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
                  <div class="col-span-1">
                      <div class="w-full h-screen bg-[red]/20"></div>
                  </div>
              </div>
          </div>
      </div>

  </div>
