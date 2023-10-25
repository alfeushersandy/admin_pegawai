<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-7 mt-5">
                                <div class="card">
                                    <div class="card-header">{{ __('Register') }}</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">Departemen</label>

                                                    <div class="col-md-6">
                                                        <select class="form-control col-md-6" id="exampleFormControlSelect1" name="departemen">
                                                        <option>Directorate</option>
                                                        <option>Finance</option>
                                                        <option>Accounting</option>
                                                        <option>HRD & GA</option>
                                                        <option>Legal & Permit</option>
                                                        <option>Marketing</option>
                                                        <option>Project</option>
                                                        <option>PPIC</option>
                                                        <option>Procurement</option>
                                                        <option>Information Technology</option>
                                                        <option>AMP & SC Magelang</option>
                                                        <option>AMP & SC Bawen</option>
                                                        <option>AMP Gombong</option>
                                                        <option>AMP & SC Purworejo</option>
                                                        <option>CMP Magelang</option>
                                                        <option>CMP Bawen</option>
                                                        <option>CMP Kaliwungu</option>
                                                        <option>Technical</option>
                                                        <option>Peralatan</option>
                                                        <option>Precast & SC Tempuran</option>
                                                        <option>Mining Kulon Progo</option>
                                                        <option>Operasional</option>
                                                        <option>PT ADITYA</option>
                                                        <option>UNIT</option>
                                                        <option>CKC</option>
                                                        <option>CEO</option>
                                                        </select>
                                                    </div>
                                        </div>

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
