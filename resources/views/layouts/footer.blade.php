<style>
        .footer {
            background-color: #0a0a0a;
            color: #fff;
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
            margin-top: 3rem; 
        }
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(to right, transparent, #a855f7, transparent);
        }
        .footer h5 {
            color: #a855f7;
            margin-bottom: 1.5rem;
        }
        .footer ul {
            list-style-type: none;
            padding: 0;
        }
        .footer ul li {
            margin-bottom: 0.5rem;
        }
        .footer ul li a {
            color: #e0e0e0;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer ul li a:hover {
            color: #a855f7;
        }
        .footer .social-icons a {
            color: #fff;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }
        .footer .social-icons a:hover {
            color: #a855f7;
        }
        .copyright {
            margin-top: 2rem;
            text-align: center;
            color: #888;
        }
</style>

<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h5>Sobre NeuroCursos</h5>
                    <p>Somos líderes em educação tecnológica avançada, oferecendo cursos de ponta em IA, Machine Learning e Ciência de Dados.</p>
                </div>
                <div class="col-lg-6">
                    <h5>Contato</h5>
                    <ul>
                        <li>Email: info@neurocursos.com</li>
                        <li>Telefone: (11) 1234-5678</li>
                        <li>Endereço: Av. Tecnológica, 1000 - São Paulo, SP</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 NeuroCursos. Todos os direitos reservados.</p>
        </div>
    </footer>