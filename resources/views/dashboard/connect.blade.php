@extends('dashboard.index')
@section('connect')
    <div class="container mx-auto p-3 shadow-md bg-white">
        <div class="flex items-center justify-between pb-2 ">
            <h1>Manage Numbers</h1>
            <div class="flex items-center gap-2">
                <span class="text-sm bg-v-accent px-2 rounded">1 of 3 Slots</span>
                <button type="button" class="btn btn-sm rounded bg-v-accent hover:bg-v-accent"
                    onclick="connect_whatsapp.showModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Connect New Whatsapp
                </button>
                <dialog id="connect_whatsapp" class="modal">
                    <div class="modal-box rounded-none">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <h3 class="font-bold text-lg">Connect to Whatsapp</h3>
                        <div class="mb-4 text-sm">
                            <div class="py-2">1. Open <span class="badge badge-ghost rounded font-medium">Whatsapp</span>On your phone.</div>
                            <hr class="mt-1">
                            <div class="py-2">2. Click <span class="badge badge-ghost rounded font-medium">3-dots</span>menu on top right corner.</div>
                            <hr class="mt-1">
                            <div class="py-2">3. Tap on <span class="badge badge-ghost rounded font-medium">"Linked Devices"</span></div>
                            <hr class="mt-1">
                            <div class="py-2">4. After that <span class="badge badge-ghost rounded font-medium">Generate QR Code</span> and <span class="badge badge-ghost rounded font-medium">Scan QR Code</span>Below.</div>
                            <hr class="mt-1">
                        </div>
                        <div class="p-4 border w-full flex flex-col items-center rounded-sm">
                            <button class="btn btn-sm px-3 btn-primary rounded my-5">Generate QR Code</button>
                        </div>
                    </div>
                </dialog>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" class="checkbox checkbox-sm rounded" />
                        </label>
                    </th>
                    <th>Whatsapp Number</th>
                    <th>Device</th>
                    <th>Connected at</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" class="checkbox checkbox-sm rounded" />
                        </label>
                    </th>
                    <td>
                        <div class="font-bold">Kangyann</div>
                        <div class="text-sm opacity-50">6283829055059</div>
                    </td>
                    <td>
                        <span>Android</span>
                    </td>
                    <td>{{ now() }}</td>
                    <td>Online</td>
                    <td>
                        <div class="dropdown dropdown-left">
                            <div tabindex="0" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </div>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded w-52">
                                <li><a>Disconnect</a></li>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
