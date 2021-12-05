<!DOCTYPE html>
<html>
  
<head>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
  
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <ul class="diamond">
                    <li><a href="{{ route('student.index') }}" class="text-sm text-gray-700 underline">Student List <i class="arrow right"></i></a></li>
                    <li><a href="{{ url('/student.list') }}" class="text-sm text-gray-700 underline">Staff List <i class="arrow right"></i></a></li>
                    <li><a href="{{ url('/student.list') }}" class="text-sm text-gray-700 underline">Department <i class="arrow right"></i></a></li>
                </ul>
                <div class="social-login">
                    <h3>Student Management</h3>
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</body>
  
</html>