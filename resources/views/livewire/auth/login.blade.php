<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="login-box">
        <h2 class="text-center">Login</h2>
        <p style="color:rgb(214, 15, 15); text-align:center;">{{$errorMessage}}</p>
        <p style="color:rgb(35, 214, 15); text-align:center;">{{$successMessage}}</p>
         <form wire:submit.prevent>
            @error('email')
                <small style="color:rgb(147, 119, 119);">{{ $message }}</small>
                <br><br>
            @enderror
            <div class="user-box">
                <input wire:model.debounce.700ms='email' type="text" name="" required="">
                <label>Username</label>

            </div>
            @error('password')
                <small style="color:rgb(147, 119, 119);"   class="text-danger">{{ $message }}</small>
                <br><br>
            @enderror
            <div class="user-box">
                <input wire:model.debounce.700ms='password' type="password" name="" required="">
                <label>Password</label>
            </div>


            <a wire:loading.remove wire:click='login' type='submit' href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </a>
            {{-- <button wire:loading wire:target='login' disabled>loading</button> --}}
           
                {{-- <div > loading</div> --}}
                

                <div wire:loading wire:target='login' class="wrapper">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="shadow"></div>
                    <div class="shadow"></div>
                    <div class="shadow"></div>
                </div>

           
            </form>
    </div>

</div>
