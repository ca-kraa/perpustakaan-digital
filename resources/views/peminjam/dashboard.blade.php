@extends('layout.main3')
@section('title', 'Selamat Datang')
@section('Dashboard Untuk', 'Peminjam')


@section('konten')
    <div class="card">
        <div class="card-header p-3 pt-2">
            <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-2 position-absolute">
                <i class="material-icons opacity-10">alarm</i>
            </div>
            <div class="text-end pt-1" id="jam">
                <p class="text-sm mb-0 text-capitalize">Jam</p>
                <h4 class="mb-0">Loading...</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateClock() {
                var now = new Date().toLocaleString("en-US", {
                    timeZone: "Asia/Jakarta"
                });
                now = new Date(now);

                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                hours = (hours < 10) ? "0" + hours : hours;
                minutes = (minutes < 10) ? "0" + minutes : minutes;
                seconds = (seconds < 10) ? "0" + seconds : seconds;

                var timeString = hours + ":" + minutes + ":" + seconds;
                document.getElementById('jam').lastElementChild.textContent = timeString;
            }

            setInterval(updateClock, 1000);
        });
    </script>

@endsection
