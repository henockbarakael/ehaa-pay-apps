<div class="row my-3">
    <div class="col-12 profile-sidebar">
        <div class="clearfix"></div>
        <div class="circle small one"></div>
        <div class="circle small two"></div>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 194.287 141.794" class="menubg">
            <defs>
                <lineargradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientunits="objectBoundingBox">
                    <stop offset="0" stop-color="#09b2fd"></stop>
                    <stop offset="1" stop-color="#6b00e5"></stop>
                </lineargradient>
            </defs>
            <path id="menubg" d="M672.935,207.064c-19.639,1.079-25.462-3.121-41.258,10.881s-24.433,41.037-49.5,34.15-14.406-16.743-50.307-29.667-32.464-19.812-16.308-41.711S500.472,130.777,531.872,117s63.631,21.369,93.913,15.363,37.084-25.959,56.686-19.794,4.27,32.859,6.213,44.729,9.5,16.186,9.5,26.113S692.573,205.985,672.935,207.064Z" transform="translate(-503.892 -111.404)" fill="url(#linear-gradient)"></path>
        </svg> --}}

        <div class="row mt-3">
            <div class="col-auto">
                <figure class="avatar avatar-80 rounded-20 p-1 bg-white shadow-sm">
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="" class="rounded-18">
                </figure>
            </div>
            <div class="col px-0 align-self-center">
                <h5 class="mb-2">Henock BARAKAEL</h5>
                <p class="text-muted size-12">80, AV. Révolution,<br>Kinshasa-RDC</p>
            </div>
        </div>
    </div>
</div>