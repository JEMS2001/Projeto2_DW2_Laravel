<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeuroCursos - Plataforma de Aprendizado Avançado</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #0a0a0a;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 1rem;
            box-shadow: 0 0 15px rgba(128, 0, 255, 0.7);
        }
        .navbar-nav {
            margin-left: auto;
        }
        .nav-item {
            margin-left: 1rem;
        }
        .nav-link {
            color: #fff !important;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .nav-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #a855f7;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #a855f7 !important;
            text-shadow: 0 0 5px #a855f7;
        }
        .nav-link:hover:before {
            width: 100%;
        }
        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .navbar-brand:hover {
            color: #a855f7 !important;
            text-shadow: 0 0 10px #a855f7;
        }
        .hero-section {
            padding: 5rem 0;
            background: linear-gradient(45deg, #1a0033, #3c006b);
            position: relative;
            overflow: hidden;
        }
        .hero-section:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(138, 43, 226, 0.1) 0%, rgba(138, 43, 226, 0) 70%);
            animation: pulse 15s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.3;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.5;
            }
            100% {
                transform: scale(1);
                opacity: 0.3;
            }
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            color: #fff;
            text-shadow: 0 0 10px rgba(168, 85, 247, 0.7);
            animation: glow 2s ease-in-out infinite alternate;
        }
        @keyframes glow {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #a855f7, 0 0 20px #a855f7;
            }
            to {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #a855f7, 0 0 40px #a855f7;
            }
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #e0e0e0;
        }
        .btn-primary {
            background-color: #a855f7;
            border-color: #a855f7;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.5);
        }
        .btn-primary:hover {
            background-color: #9333ea;
            border-color: #9333ea;
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.8);
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.6);
            transition: all 0.3s ease;
        }
        .hero-image img:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px rgba(168, 85, 247, 0.8);
        }
        .courses-section {
            padding: 5rem 0;
            background-color: #0f0f0f;
        }
        .course-card {
            background-color: #1a1a1a;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
            opacity: 0;
            transform: translateY(20px);
        }
        .course-card.animate {
            animation: fadeInUp 0.6s ease forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.5);
        }
        .course-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .course-card .card-body {
            padding: 1.5rem;
        }
        .course-card .card-title {
            color: #a855f7;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .course-card .card-text {
            color: #e0e0e0;
            margin-bottom: 1.5rem;
        }
        .course-card .btn-outline-light {
            border-color: #a855f7;
            color: #a855f7;
            transition: all 0.3s ease;
        }
        .course-card .btn-outline-light:hover {
            background-color: #a855f7;
            color: #fff;
        }
        .animate-text {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .animate-text.animate {
            opacity: 1;
            transform: translateY(0);
        }



        .lightning {
            position: absolute;
            background: linear-gradient(to bottom, rgba(255,255,255,0.7), rgba(168,85,247,0.7));
            width: 2px;
            height: 0;
            transform-origin: 50% 0%;
            opacity: 0;
            filter: blur(1px);
            box-shadow: 0 0 10px #fff, 0 0 20px #a855f7;
        }

        @media (max-width: 991px) {
            .navbar-nav {
                margin-left: 0;
            }
            .nav-item {
                margin-left: 0;
                margin-top: 0.5rem;
            }
            .hero-content h1 {
                font-size: 2.5rem;
            }
            .hero-image {
                margin-top: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">NeuroCursos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Cadastro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="animate-text">Expanda Sua Mente Digital</h1>
                    <p class="animate-text">Domine as tecnologias do futuro com nossos cursos de ponta em IA, Machine Learning e Ciência de Dados.</p>
                    <a href="#courses" class="btn btn-primary btn-lg animate-text">Explorar Cursos</a>
                </div>
                <div class="col-lg-6 hero-image">
                    <img src="img\imagem2.png" alt="AI Visualization" class="animate-text" />
                </div>
            </div>
        </div>
    </section>

    <section id="courses" class="courses-section">
        <div class="container">
            <h2 class="text-center mb-5 animate-text" style="color: #a855f7;">Nossos Cursos Revolucionários</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <img src="img\imagem4.png" alt="Curso de IA" />
                        <div class="card-body">
                            <h5 class="card-title">Inteligência Artificial Avançada</h5>
                            <p class="card-text">Mergulhe no fascinante mundo da IA e aprenda a criar sistemas inteligentes de última geração.</p>
                            <a href="/login" class="btn btn-outline-light">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <img src="img\imagem5.png" alt="Curso de Machine Learning" />
                        <div class="card-body">
                            <h5 class="card-title">Machine Learning Transformador</h5>
                            <p class="card-text">Domine algoritmos de ML e crie modelos preditivos que revolucionarão indústrias.</p>
                            <a href="/login" class="btn btn-outline-light">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <img src="img\imagem6.png" alt="Curso de Ciência de Dados" />
                        <div class="card-body">
                            <h5 class="card-title">Ciência de Dados Disruptiva</h5>
                            <p class="card-text">Transforme dados brutos em insights poderosos e tome decisões baseadas em evidências.</p>
                            <a href="/login" class="btn btn-outline-light">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome para ícones sociais -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Animate hero section elements
        const heroAnimatedElements = document.querySelectorAll('.hero-section .animate-text');
        heroAnimatedElements.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('animate');
            }, 200 * index);
        });

        // Animate course cards on scroll
        const courseCards = document.querySelectorAll('.course-card');
        const coursesTitle = document.querySelector('.courses-section h2');

        const animateOnScroll = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    observer.unobserve(entry.target);
                }
            });
        };

        const observer = new IntersectionObserver(animateOnScroll, {
            root: null,
            threshold: 0.1
        });

        observer.observe(coursesTitle);
        courseCards.forEach(card => observer.observe(card));

      // Função para criar efeito de raio melhorado
      function createLightning() {
            const hero = document.querySelector('.hero-section');
            const lightning = document.createElement('div');
            lightning.classList.add('lightning');
            
            const startX = Math.random() * 100;
            const startY = Math.random() * 50;
            const endX = startX + (Math.random() * 50 - 25);
            const endY = startY + (Math.random() * 50 + 25);
            
            lightning.style.left = `${startX}%`;
            lightning.style.top = `${startY}%`;
            lightning.style.transform = `rotate(${Math.atan2(endY - startY, endX - startX)}rad)`;
            
            hero.appendChild(lightning);
            
            setTimeout(() => {
                lightning.style.height = `${Math.sqrt(Math.pow(endX - startX, 2) + Math.pow(endY - startY, 2))}px`;
                lightning.style.opacity = '1';
                
                setTimeout(() => {
                    lightning.style.opacity = '0';
                    setTimeout(() => {
                        hero.removeChild(lightning);
                    }, 200);
                }, 100);
            }, 10);

            // Adiciona raios secundários
            if (Math.random() > 0.7) {
                setTimeout(() => {
                    const branchStartX = startX + (endX - startX) * Math.random();
                    const branchStartY = startY + (endY - startY) * Math.random();
                    const branchEndX = branchStartX + (Math.random() * 30 - 15);
                    const branchEndY = branchStartY + (Math.random() * 30 + 15);

                    const branchLightning = document.createElement('div');
                    branchLightning.classList.add('lightning');
                    branchLightning.style.left = `${branchStartX}%`;
                    branchLightning.style.top = `${branchStartY}%`;
                    branchLightning.style.transform = `rotate(${Math.atan2(branchEndY - branchStartY, branchEndX - branchStartX)}rad)`;
                    
                    hero.appendChild(branchLightning);
                    
                    setTimeout(() => {
                        branchLightning.style.height = `${Math.sqrt(Math.pow(branchEndX - branchStartX, 2) + Math.pow(branchEndY - branchStartY, 2))}px`;
                        branchLightning.style.opacity = '1';
                        
                        setTimeout(() => {
                            branchLightning.style.opacity = '0';
                            setTimeout(() => {
                                hero.removeChild(branchLightning);
                            }, 200);
                        }, 50);
                    }, 10);
                }, 50);
            }
        }

        // Cria raios em intervalos aleatórios
        function lightningLoop() {
            createLightning();
            setTimeout(lightningLoop, Math.random() * 3000 + 1000);
        }

        lightningLoop();
    });
    </script>
</body>
</html>