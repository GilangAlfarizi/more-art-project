@extends('layouts.default')

@section('content')
    <div class="lg:mt-32 mt-24">
        <div class="bg-[#EFF0F2] flex flex-col lg:flex-row justify-center py-12">
            <div class="flex justify-center items-center w-full lg:w-1/2 lg:p-0">
                <img src="https://images.pexels.com/photos/3224230/pexels-photo-3224230.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="" class="rounded-lg lg:max-w-72 max-w-60">
            </div>
            <div class="flex justify-center lg:items-center lg:w-1/2 lg:p-0">
                <div class="lg:p-24 px-12">
                    <p class="text-4xl text-blue-900 font-bold font-dmSerif mt-8">More of More Art</p>
                    <p class="text-black lg:text-lg text-md mt-8 font-lora lg:mr-10">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row justify-center">
            <div class="lg:p-24 p-12 lg:w-1/2 lg:ml-12">
                <p class="text-4xl text-blue-900 font-bold font-dmSerif text-center lg:text-left">The Man Behind More Art
                </p>
                <div class="flex justify-center lg:justify-start">
                    <hr class="w-12 lg:my-10 my-8 border-2 rounded-full border-blue-900">
                </div>
                <p class="text-black lg:text-lg text-md font-lora lg:mr-10">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting, remaining essentially unchanged. Lorem Ipsum is
                    simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book.
                </p>
            </div>
            <div class="flex justify-center items-center w-full lg:w-1/2 lg:p-0">
                <img src="https://images.pexels.com/photos/3224230/pexels-photo-3224230.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="" class="rounded-lg lg:max-w-72 max-w-60">
            </div>
        </div>

        <div class="mt-12 lg:p-12 p-8 bg-[#EFF0F2] text-center">
            <p class="text-4xl font-bold font-dmSerif mb-10">Clients</p>
            <div class="flex flex-col lg:flex-row justify-center items-center align-middle lg:gap-24 gap-8">
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738729/gopay_lejnyw.png"
                        alt="gopay">
                </div>
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738729/ace_ajatze.png" alt="ace">
                </div>
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738728/disney_ojpwwc.svg"
                        alt="disney">
                </div>
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738728/bukalapak_gnqvt8.png"
                        alt="bukalapak">
                </div>
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738728/herborist_oufszs.png"
                        alt="herborist">
                </div>
            </div>
            <div class="flex flex-col lg:flex-row justify-center items-center align-middle lg:gap-24 gap-8 mt-8">
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738728/infinix_edra3m.png"
                        alt="infinix">
                </div>
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738728/LPS_shhitc.png" alt="LPS">
                </div>

                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738728/yellowfit_peb8ei.ico"
                        alt="yellowfit">
                </div>
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738991/panasonic_isqyo5.jpg"
                        alt="panasonic">
                </div>
                <div class="max-w-24">
                    <img src="https://res.cloudinary.com/dmahgqymw/image/upload/v1738738991/dunhill_d05oxm.png"
                        alt="dunhill">
                </div>
            </div>
        </div>
    </div>

    <div class="lg:m-24 m-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="p-4 my-4 rounded bg-red-600 text-white-900">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="text-4xl font-bold font-dmSerif text-center">Contact</p>
        <form action="{{ route('home.about.sendEmail') }}" method="post" class="max-w-lg mx-auto mt-10">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2 font-medium text-gray-900 font-lora">Email</label>
                <input type="email" name="email"
                    class="shadow-sm font-lora bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="example@email.com" required />
            </div>
            <div class="mb-5">
                <label for="message" class="block mb-2 font-medium text-gray-900 font-lora">Message</label>
                <textarea rows="4" name="message" required
                    class="block p-2.5 w-full font-lora text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Leave a message..."></textarea>
            </div>
            <button type="submit"
                class="text-white-900 bg-blue-900 hover:bg-blue-950 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Send
                Message</button>
        </form>
    </div>
@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
