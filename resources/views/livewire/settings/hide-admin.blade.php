<div class="fi-form">
    <section x-data="{
        isCollapsed:  false ,
    }" class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <header class="fi-section-header flex flex-col gap-3 px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="flex justify-between items-center w-full">
                    <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                        Hide URL Login
                    </h3>
                </div>
            </div>
        </header>
        <div class="fi-section-content-ctn border-t border-gray-200 dark:border-white/10">
            <div class="fi-section-content p-6 space-y-6">
                {{$this->form}}
                {{$this->saveLogin}}
            </div>
        </div>
    </section>


</div>
