<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</head>
<body class="layout <?php echo $className; ?>">

<main>
    <div class="layout__form-header pt-4 pb-4">
        <section class="container">
            <div class="row">
                <div class="layout__form-box col-12">
                    <form action="/api" class="layout__form js-form clearfix animate__animated animate__bounceInDown">
                        <div class="layout__form-group">
                            <div class="layout__form-switch-box">
                                <p>Local Api</p>
                                <div class="layout__form-switch">
                                    <label for="switch"></label>
                                    <input type="checkbox" value="0" id="switch">
                                    <span></span>
                                </div>
                            </div>
                            <input type="email" name="email" class="layout__form-input"
                                   placeholder="Search user from email" id="email">
                            <label class="js-error"></label>
                            <button type="submit" class="btn layout__form-btn bi bi-search"></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 layout__spinner">
                <div class="layout__spinner-box js-spinner">
                    <div class="loader">Loading...</div>
                </div>
            </div>
            <div class="col-12 js-body d-none animate__animated">

                <div class="layout__profile-box">
                    <div class="layout__profile-header">

                    </div>
                    <div class="layout__profile-body row m-0">
                        <div class="col-12 col-sm-3 layout__profile-avatar-box">
                            <div class="layout__profile-avatar">

                            </div>
                        </div>
                        <div class="col-10 col-12 col-sm-9 mb-4">
                            <h2 class="title"><span class="name"></span><span class="nickname"></span></h2>
                            <a href="" class="icon-text email text-center text-sm-left"></a>
                        </div>
                        <div class="col-12 layout__profile-info2">
                            <div class="row m-0">
                                <div class="col-6 col-sm animate__animated anim1">
                                    <p class="icon-text text phone text-center"></p>
                                </div>
                                <div class="col-6 col-sm animate__animated anim2">
                                    <p class="icon-text text address text-center">
                                        <span class="street"></span>
                                        <span class="suite"></span>
                                        <span class="city"></span>
                                    </p>
                                </div>
                                <div class="col-12 col-sm col-last animate__animated anim3">
                                    <p class="text-center"><a href="" class="icon-text website" target="_blank"></a></p>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 layout__profile-info">
                            <h4>Company</h4>
                            <p class="company">
                                <span class="icon-text company-name"></span>
                                <span class="catchPhrase"></span>
                                <span class="bs"></span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="/js/AppRender.js"></script>
<script src="/js/app.js"></script>
</body>
</html>