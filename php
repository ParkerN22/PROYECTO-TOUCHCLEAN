<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TouchClean — Servicios de Limpieza</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --blue-deep:   #1a3a5c;
      --blue-mid:    #2f6aad;
      --blue-soft:   #5b9bd5;
      --blue-pale:   #d6eaf8;
      --blue-foam:   #eef6fd;
      --yellow:      #f5c842;
      --yellow-soft: #fdeea3;
      --yellow-pale: #fffbe8;
      --white:       #ffffff;
      --linen:       #d0e8f7;
      --charcoal:    #0f2236;
      --mist:        #a8c5e0;
      --text-dark:   #0f2236;
      --text-mid:    #3d6080;
      --text-light:  #7fa8c9;
      --accent:      #cde4f5;
      --radius-lg:   2rem;
      --radius-md:   1.2rem;
      --transition:  0.45s cubic-bezier(0.22,0.61,0.36,1);
    }
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    html{scroll-behavior:smooth}
    body{font-family:'DM Sans',sans-serif;background:var(--linen);color:var(--text-dark);overflow-x:hidden}
    body::before{content:'';position:fixed;inset:0;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");pointer-events:none;z-index:9999}

    /* NAV */
    nav{position:fixed;top:0;left:0;right:0;z-index:100;display:flex;align-items:center;justify-content:space-between;padding:1.4rem 4rem;background:rgba(208,232,247,0.93);backdrop-filter:blur(14px);border-bottom:1px solid var(--accent)}
    .nav-logo{font-family:'DM Serif Display',serif;font-size:1.6rem;color:var(--blue-deep);letter-spacing:-0.02em}
    .nav-logo span{color:var(--yellow);font-style:italic}
    .nav-links{display:flex;gap:2.5rem;list-style:none}
    .nav-links a{text-decoration:none;font-size:0.88rem;font-weight:500;color:var(--text-mid);letter-spacing:0.04em;text-transform:uppercase;transition:color var(--transition)}
    .nav-links a:hover{color:var(--blue-deep)}
    .nav-cta{background:var(--blue-mid);color:var(--white)!important;padding:0.6rem 1.5rem;border-radius:99px;transition:background var(--transition),transform var(--transition)!important}
    .nav-cta:hover{background:var(--blue-deep)!important;transform:translateY(-2px)}

    /* HERO */
    .hero{min-height:100vh;display:grid;grid-template-columns:1fr 1fr;align-items:center;padding:7rem 4rem 4rem;gap:4rem;position:relative;overflow:hidden}
    .hero::after{content:'';position:absolute;right:-10%;top:5%;width:65vw;height:65vw;border-radius:50%;background:radial-gradient(circle,var(--blue-pale) 0%,transparent 70%);pointer-events:none}
    /* yellow blob accent */
    .hero::before{content:'';position:absolute;left:-5%;bottom:5%;width:30vw;height:30vw;border-radius:50%;background:radial-gradient(circle,var(--yellow-soft) 0%,transparent 70%);pointer-events:none;z-index:0}
    .hero-text{position:relative;z-index:2}
    .hero-badge{display:inline-flex;align-items:center;gap:0.5rem;background:var(--yellow-soft);color:var(--blue-deep);font-size:0.78rem;font-weight:500;letter-spacing:0.06em;text-transform:uppercase;padding:0.45rem 1rem;border-radius:99px;margin-bottom:2rem;opacity:0;animation:fadeUp 0.7s 0.2s forwards;border:1px solid rgba(245,200,66,0.4)}
    .hero-badge::before{content:'✦';color:var(--yellow);font-size:0.7rem}
    .hero h1{font-family:'DM Serif Display',serif;font-size:clamp(3rem,5vw,5.2rem);line-height:1.08;color:var(--charcoal);letter-spacing:-0.03em;opacity:0;animation:fadeUp 0.8s 0.35s forwards}
    .hero h1 em{font-style:italic;color:var(--blue-mid)}
    .hero-sub{margin-top:1.8rem;font-size:1.05rem;line-height:1.75;color:var(--text-mid);max-width:44ch;font-weight:300;opacity:0;animation:fadeUp 0.8s 0.5s forwards}
    .hero-actions{display:flex;gap:1rem;align-items:center;margin-top:2.8rem;opacity:0;animation:fadeUp 0.8s 0.65s forwards}
    .btn-primary{background:var(--blue-deep);color:var(--white);padding:0.9rem 2.2rem;border-radius:99px;font-size:0.92rem;font-weight:500;text-decoration:none;transition:background var(--transition),transform var(--transition),box-shadow var(--transition);box-shadow:0 6px 24px rgba(15,34,54,0.22)}
    .btn-primary:hover{background:var(--blue-mid);transform:translateY(-3px);box-shadow:0 12px 32px rgba(47,106,173,0.3)}
    .btn-ghost{color:var(--text-mid);font-size:0.9rem;text-decoration:none;display:flex;align-items:center;gap:0.4rem;transition:color var(--transition),gap var(--transition)}
    .btn-ghost:hover{color:var(--blue-deep);gap:0.7rem}
    .hero-visual{position:relative;z-index:2;display:flex;flex-direction:column;gap:1.2rem;opacity:0;animation:fadeLeft 0.9s 0.5s forwards}
    .hero-card{background:var(--white);border-radius:var(--radius-lg);padding:2rem 2.4rem;box-shadow:0 4px 40px rgba(15,34,54,0.08);display:flex;align-items:center;gap:1.5rem;transition:transform var(--transition),box-shadow var(--transition)}
    .hero-card:hover{transform:translateY(-4px);box-shadow:0 12px 48px rgba(15,34,54,0.14)}
    .hero-card-icon{width:3.6rem;height:3.6rem;background:var(--blue-foam);border-radius:1rem;display:flex;align-items:center;justify-content:center;font-size:1.6rem;flex-shrink:0}
    .hero-card h3{font-size:1rem;font-weight:500;color:var(--charcoal)}
    .hero-card p{font-size:0.82rem;color:var(--text-light);margin-top:0.2rem;line-height:1.5}
    .stat-row{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}
    .stat-box{background:var(--blue-mid);border-radius:var(--radius-md);padding:1.4rem 1.2rem;color:var(--white);text-align:center;transition:transform var(--transition)}
    .stat-box:nth-child(2){background:var(--yellow);color:var(--blue-deep)}
    .stat-box:hover{transform:translateY(-4px)}
    .stat-box .num{font-family:'DM Serif Display',serif;font-size:2rem;line-height:1}
    .stat-box .label{font-size:0.75rem;opacity:0.85;margin-top:0.3rem;letter-spacing:0.03em}

    /* SECTIONS */
    section{padding:6rem 4rem}
    .section-label{font-size:0.78rem;letter-spacing:0.1em;text-transform:uppercase;color:var(--blue-mid);font-weight:500;margin-bottom:0.8rem;display:flex;align-items:center;gap:0.6rem}
    .section-label::before{content:'';display:block;width:2rem;height:1.5px;background:var(--blue-soft)}
    .section-title{font-family:'DM Serif Display',serif;font-size:clamp(2rem,3.5vw,3.2rem);color:var(--charcoal);letter-spacing:-0.025em;line-height:1.15}
    .section-title em{font-style:italic;color:var(--blue-mid)}

    /* SERVICES */
    .services-section{background:var(--blue-foam)}
    .services-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:3.5rem;flex-wrap:wrap;gap:1rem}
    .services-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem}
    .service-card{background:var(--white);border-radius:var(--radius-lg);padding:2.4rem 2rem;position:relative;overflow:hidden;transition:transform var(--transition),box-shadow var(--transition);cursor:pointer}
    .service-card::before{content:'';position:absolute;bottom:0;left:0;right:0;height:0;background:linear-gradient(to top,var(--blue-pale),transparent);transition:height var(--transition);border-radius:var(--radius-lg)}
    .service-card:hover::before{height:100%}
    .service-card:hover{transform:translateY(-6px);box-shadow:0 16px 48px rgba(47,106,173,0.15)}
    .service-card .icon{font-size:2.4rem;margin-bottom:1.5rem;position:relative;z-index:1;display:block}
    .service-card h3{font-family:'DM Serif Display',serif;font-size:1.4rem;color:var(--charcoal);margin-bottom:0.7rem;position:relative;z-index:1}
    .service-card p{font-size:0.88rem;color:var(--text-mid);line-height:1.7;position:relative;z-index:1;font-weight:300}
    .service-card .price{margin-top:1.5rem;font-size:0.82rem;font-weight:500;color:var(--blue-mid);letter-spacing:0.04em;position:relative;z-index:1}
    /* featured card: deep blue bg, yellow accent */
    .service-card.featured{background:var(--blue-deep)}
    .service-card.featured h3{color:var(--white)}
    .service-card.featured p{color:var(--mist)}
    .service-card.featured .price{color:var(--yellow)}
    .service-card.featured::before{background:linear-gradient(to top,rgba(245,200,66,0.1),transparent)}

    /* PRODUCTS */
    .products-section{background:var(--linen)}
    .products-scroll{display:grid;grid-template-columns:repeat(4,1fr);gap:1.2rem;margin-top:3rem}
    .product-card{background:var(--white);border-radius:var(--radius-md);overflow:hidden;transition:transform var(--transition),box-shadow var(--transition)}
    .product-card:hover{transform:translateY(-5px);box-shadow:0 12px 40px rgba(15,34,54,0.1)}
    .product-thumb{height:11rem;display:flex;align-items:center;justify-content:center;font-size:4rem}
    .pt-1{background:linear-gradient(135deg,#cde4f5,#8fbfe8)}
    .pt-2{background:linear-gradient(135deg,#d6eaf8,#a3cceb)}
    .pt-3{background:linear-gradient(135deg,#fff8d0,#fde89a)}
    .pt-4{background:linear-gradient(135deg,#ddeeff,#b5d8f5)}
    .product-info{padding:1.2rem 1.3rem 1.5rem}
    .product-info h4{font-size:0.95rem;font-weight:500;color:var(--charcoal)}
    .product-info p{font-size:0.78rem;color:var(--text-light);margin-top:0.3rem;line-height:1.5}
    .price-tag{display:flex;justify-content:space-between;align-items:center;margin-top:1rem}
    .price-tag span{font-weight:500;font-size:1rem;color:var(--charcoal)}
    .add-btn{background:var(--blue-pale);border:none;width:2rem;height:2rem;border-radius:50%;cursor:pointer;font-size:1.1rem;color:var(--blue-mid);display:flex;align-items:center;justify-content:center;transition:background var(--transition),color var(--transition),transform var(--transition)}
    .add-btn:hover{background:var(--blue-mid);color:var(--white);transform:scale(1.15)}

    /* WHY */
    .why-section{background:var(--blue-deep);color:var(--white);display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:center}
    .why-section .section-label{color:var(--yellow)}
    .why-section .section-label::before{background:rgba(245,200,66,0.5)}
    .why-section .section-title{color:var(--white)}
    .why-section .section-title em{color:var(--yellow)}
    .why-list{display:flex;flex-direction:column;gap:1.4rem;margin-top:2.5rem}
    .why-item{display:flex;gap:1.2rem;align-items:flex-start;background:rgba(255,255,255,0.07);border-radius:var(--radius-md);padding:1.3rem 1.5rem;backdrop-filter:blur(4px);transition:background var(--transition),transform var(--transition)}
    .why-item:hover{background:rgba(255,255,255,0.13);transform:translateX(6px)}
    .why-item-icon{font-size:1.6rem;flex-shrink:0}
    .why-item h4{font-size:0.95rem;font-weight:500;margin-bottom:0.3rem}
    .why-item p{font-size:0.82rem;opacity:0.7;line-height:1.6;font-weight:300}
    .testimonial-block{background:rgba(255,255,255,0.08);border-radius:var(--radius-lg);padding:2.5rem;backdrop-filter:blur(6px);border:1px solid rgba(245,200,66,0.2)}
    .testimonial-block blockquote{font-family:'DM Serif Display',serif;font-style:italic;font-size:1.5rem;line-height:1.45;color:var(--white);margin-bottom:1.5rem}
    .testimonial-author{display:flex;align-items:center;gap:1rem}
    .avatar{width:3rem;height:3rem;background:var(--blue-soft);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
    .testimonial-author h5{font-size:0.9rem;font-weight:500}
    .testimonial-author p{font-size:0.78rem;opacity:0.7;margin-top:0.1rem}
    .stars{color:var(--yellow);letter-spacing:0.05em;font-size:0.9rem;margin-bottom:0.5rem}

    /* PROCESS */
    .process-section{background:var(--blue-foam)}
    .process-steps{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;margin-top:3.5rem;position:relative}
    .process-steps::before{content:'';position:absolute;top:2.5rem;left:10%;right:10%;height:1.5px;background:linear-gradient(to right,var(--accent),var(--blue-soft),var(--accent));z-index:0}
    .step{text-align:center;position:relative;z-index:1}
    .step-num{width:5rem;height:5rem;border-radius:50%;background:var(--white);border:2px solid var(--accent);margin:0 auto 1.5rem;display:flex;align-items:center;justify-content:center;font-family:'DM Serif Display',serif;font-size:1.4rem;color:var(--blue-deep);transition:background var(--transition),border-color var(--transition),color var(--transition),transform var(--transition)}
    .step:hover .step-num{background:var(--yellow);border-color:var(--yellow);color:var(--blue-deep);transform:scale(1.1)}
    .step h4{font-size:0.95rem;font-weight:500;color:var(--charcoal);margin-bottom:0.5rem}
    .step p{font-size:0.8rem;color:var(--text-light);line-height:1.6;font-weight:300}

    /* CTA */
    .cta-section{background:var(--yellow);padding:5rem 4rem;text-align:center;position:relative;overflow:hidden}
    .cta-section::before{content:'';position:absolute;top:-40%;left:50%;transform:translateX(-50%);width:80%;height:80%;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,0.35) 0%,transparent 70%)}
    .cta-section .section-label{color:var(--blue-deep);justify-content:center}
    .cta-section .section-label::before{background:var(--blue-mid)}
    .cta-section .section-title{color:var(--blue-deep);text-align:center}
    .cta-section .section-title em{color:var(--blue-mid)}
    .cta-section p{color:var(--blue-deep);opacity:0.75;font-size:1rem;margin:1.2rem auto 2.5rem;max-width:50ch;line-height:1.75;font-weight:300}
    .cta-btns{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}
    .btn-dark{background:var(--blue-deep);color:var(--white);padding:0.9rem 2.2rem;border-radius:99px;text-decoration:none;font-size:0.92rem;font-weight:500;transition:transform var(--transition),box-shadow var(--transition);box-shadow:0 6px 24px rgba(15,34,54,0.25)}
    .btn-dark:hover{transform:translateY(-3px);box-shadow:0 12px 36px rgba(15,34,54,0.35)}
    .btn-outline{border:2px solid var(--blue-deep);color:var(--blue-deep);padding:0.9rem 2.2rem;border-radius:99px;text-decoration:none;font-size:0.92rem;font-weight:500;transition:border-color var(--transition),background var(--transition),transform var(--transition)}
    .btn-outline:hover{background:rgba(15,34,54,0.07);transform:translateY(-3px)}

    /* FOOTER */
    footer{background:var(--charcoal);color:var(--mist);padding:4rem 4rem 2rem;display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:3rem}
    .footer-brand p{font-size:0.85rem;line-height:1.7;margin-top:1rem;color:var(--text-light);font-weight:300;max-width:30ch}
    .footer-col h5{font-size:0.78rem;text-transform:uppercase;letter-spacing:0.08em;color:var(--white);margin-bottom:1.2rem}
    .footer-col ul{list-style:none;display:flex;flex-direction:column;gap:0.7rem}
    .footer-col a{text-decoration:none;color:var(--text-light);font-size:0.85rem;transition:color var(--transition)}
    .footer-col a:hover{color:var(--yellow)}
    .footer-bottom{grid-column:1/-1;border-top:1px solid rgba(255,255,255,0.07);padding-top:1.5rem;display:flex;justify-content:space-between;align-items:center;font-size:0.78rem;color:var(--text-light)}

    /* ANIMATIONS */
    @keyframes fadeUp{from{opacity:0;transform:translateY(28px)}to{opacity:1;transform:translateY(0)}}
    @keyframes fadeLeft{from{opacity:0;transform:translateX(32px)}to{opacity:1;transform:translateX(0)}}
    .reveal{opacity:0;transform:translateY(24px);transition:opacity 0.7s ease,transform 0.7s ease}
    .reveal.visible{opacity:1;transform:translateY(0)}

    /* RESPONSIVE */
    @media(max-width:900px){
      nav{padding:1.2rem 1.8rem}
      .nav-links{display:none}
      .hero{grid-template-columns:1fr;padding:6rem 1.8rem 3rem}
      .hero::after,.hero::before{display:none}
      section{padding:4rem 1.8rem}
      .services-grid,.products-scroll,.process-steps{grid-template-columns:1fr 1fr}
      .why-section{grid-template-columns:1fr;padding:4rem 1.8rem;gap:3rem}
      footer{grid-template-columns:1fr 1fr;padding:3rem 1.8rem 1.5rem}
      .cta-section{padding:4rem 1.8rem}
      .services-header{flex-direction:column;align-items:flex-start}
    }
  </style>
</head>
<body>

<nav>
  <div class="nav-logo">Touch<span>Clean</span></div>
  <ul class="nav-links">
    <li><a href="#servicios">Servicios</a></li>
    <li><a href="#productos">Productos</a></li>
    <li><a href="#proceso">Proceso</a></li>
    <li><a href="#contacto" class="nav-cta">Cotizar ahora</a></li>
  </ul>
</nav>

<section class="hero">
  <div class="hero-text">
    <div class="hero-badge">Certificados &amp; Confiables</div>
    <h1>Tu espacio,<br><em>impecable</em><br>y en calma.</h1>
    <p class="hero-sub">Soluciones de limpieza profesional para hogares y empresas. Productos ecológicos, equipo certificado y resultados que se notan desde el primer día.</p>
    <div class="hero-actions">
      <a href="#servicios" class="btn-primary">Ver servicios</a>
      <a href="#proceso" class="btn-ghost">Cómo funciona <span>→</span></a>
    </div>
  </div>
  <div class="hero-visual">
    <div class="hero-card">
      <div class="hero-card-icon">🏠</div>
      <div><h3>Limpieza Residencial</h3><p>Desde limpieza express hasta profunda, adaptada a tu hogar.</p></div>
    </div>
    <div class="hero-card">
      <div class="hero-card-icon">🌿</div>
      <div><h3>Productos Eco-Friendly</h3><p>Fórmulas biodegradables. Seguras para tu familia y el planeta.</p></div>
    </div>
    <div class="stat-row">
      <div class="stat-box"><div class="num">98%</div><div class="label">Satisfacción</div></div>
      <div class="stat-box"><div class="num">12+</div><div class="label">Años de exp.</div></div>
      <div class="stat-box"><div class="num">4k+</div><div class="label">Clientes</div></div>
    </div>
  </div>
</section>

<section class="services-section" id="servicios">
  <div class="services-header reveal">
    <div>
      <div class="section-label">Lo que hacemos</div>
      <h2 class="section-title">Servicios diseñados<br>para cada <em>necesidad</em></h2>
    </div>
    <a href="#contacto" class="btn-primary">Ver todos →</a>
  </div>
  <div class="services-grid">
    <div class="service-card reveal"><span class="icon">🏡</span><h3>Limpieza del Hogar</h3><p>Limpieza completa de todas las áreas de tu casa: cocina, baños, recámaras y áreas comunes. Con o sin productos incluidos.</p><div class="price">Desde $350 MXN</div></div>
    <div class="service-card featured reveal"><span class="icon">✨</span><h3>Limpieza Profunda</h3><p>Para espacios que necesitan una renovación total. Incluye desengrasado, desinfección y limpieza de difícil acceso.</p><div class="price">Desde $800 MXN</div></div>
    <div class="service-card reveal"><span class="icon">🏢</span><h3>Limpieza Empresarial</h3><p>Oficinas, locales y establecimientos. Planes semanales, quincenales o mensuales con facturación incluida.</p><div class="price">Plan mensual desde $2,200</div></div>
    <div class="service-card reveal"><span class="icon">🪟</span><h3>Limpieza de Cristales</h3><p>Ventanas interiores y exteriores, mamparas y vidrieras. Resultado libre de manchas garantizado.</p><div class="price">Desde $180 MXN</div></div>
    <div class="service-card reveal"><span class="icon">🛋️</span><h3>Tapicería y Alfombras</h3><p>Lavado profundo de sillones, colchones, alfombras y tapetes. Eliminamos bacterias, ácaros y malos olores.</p><div class="price">Desde $450 MXN</div></div>
    <div class="service-card reveal"><span class="icon">🏗️</span><h3>Post-Construcción</h3><p>Eliminamos polvo de obra, residuos de pintura y materiales. Dejamos tu espacio listo para estrenar.</p><div class="price">Desde $1,200 MXN</div></div>
  </div>
</section>

<section class="products-section" id="productos">
  <div class="reveal">
    <div class="section-label">Nuestros productos</div>
    <h2 class="section-title">Fórmulas que <em>funcionan</em><br>y cuidan el entorno</h2>
  </div>
  <div class="products-scroll">
    <div class="product-card reveal"><div class="product-thumb pt-1">🧴</div><div class="product-info"><h4>Desengrasante Azul</h4><p>Biodegradable, sin cloro. Ideal para cocinas y superficies grasas.</p><div class="price-tag"><span>$89</span><button class="add-btn">+</button></div></div></div>
    <div class="product-card reveal"><div class="product-thumb pt-2">🫧</div><div class="product-info"><h4>Multiusos Espuma</h4><p>Limpia y desinfecta en un solo paso. Aroma fresco de menta.</p><div class="price-tag"><span>$75</span><button class="add-btn">+</button></div></div></div>
    <div class="product-card reveal"><div class="product-thumb pt-3">🌸</div><div class="product-info"><h4>Aromatizante Cítrico</h4><p>Neutraliza olores y deja una fragancia duradera y energizante.</p><div class="price-tag"><span>$65</span><button class="add-btn">+</button></div></div></div>
    <div class="product-card reveal"><div class="product-thumb pt-4">🧹</div><div class="product-info"><h4>Kit de Limpieza Pro</h4><p>Set completo con paños de microfibra, esponjas y guantes reutilizables.</p><div class="price-tag"><span>$249</span><button class="add-btn">+</button></div></div></div>
  </div>
</section>

<section class="why-section">
  <div class="reveal">
    <div class="section-label">Por qué elegirnos</div>
    <h2 class="section-title">Limpieza con<br><em>propósito</em> y cuidado</h2>
    <div class="why-list">
      <div class="why-item"><div class="why-item-icon">🛡️</div><div><h4>Personal certificado y verificado</h4><p>Todo nuestro equipo cuenta con capacitación, carta de buena conducta y seguro de responsabilidad civil.</p></div></div>
      <div class="why-item"><div class="why-item-icon">🌱</div><div><h4>Productos 100% ecológicos</h4><p>Fórmulas sin químicos agresivos, seguros para niños, mascotas y el medio ambiente.</p></div></div>
      <div class="why-item"><div class="why-item-icon">⏰</div><div><h4>Puntualidad garantizada</h4><p>Llegamos en el horario acordado. Si nos retrasamos más de 15 min, recibes un descuento automático.</p></div></div>
      <div class="why-item"><div class="why-item-icon">🔄</div><div><h4>Satisfacción o repetimos</h4><p>Si no quedas 100% satisfecho, regresamos sin costo adicional. Tu tranquilidad es nuestra prioridad.</p></div></div>
    </div>
  </div>
  <div class="testimonial-block reveal">
    <div class="stars">★★★★★</div>
    <blockquote>"Llevamos 2 años con TouchClean y mi oficina nunca había lucido tan bien. El equipo es discreto, puntual y los resultados hablan solos."</blockquote>
    <div class="testimonial-author">
      <div class="avatar">👩</div>
      <div><h5>Daniela Ruiz</h5><p>Directora Creativa · CDMX</p></div>
    </div>
  </div>
</section>

<section class="process-section" id="proceso">
  <div class="reveal" style="text-align:center;max-width:60ch;margin:0 auto 0">
    <div class="section-label" style="justify-content:center">Así de fácil</div>
    <h2 class="section-title">Cuatro pasos hacia<br>un espacio <em>impecable</em></h2>
  </div>
  <div class="process-steps">
    <div class="step reveal"><div class="step-num">1</div><h4>Cotiza en línea</h4><p>Cuéntanos el tipo de espacio y el servicio que necesitas. Sin compromiso.</p></div>
    <div class="step reveal"><div class="step-num">2</div><h4>Elige fecha y hora</h4><p>Selecciona el horario que mejor se adapte a tu rutina. Confirmamos en 5 min.</p></div>
    <div class="step reveal"><div class="step-num">3</div><h4>Llegamos a tiempo</h4><p>Nuestro equipo llega puntual, con todo el equipo y los productos necesarios.</p></div>
    <div class="step reveal"><div class="step-num">4</div><h4>¡Disfruta el resultado!</h4><p>Inspecciona tu espacio, califica el servicio y agenda el siguiente con descuento.</p></div>
  </div>
</section>

<section class="cta-section" id="contacto">
  <div class="reveal" style="position:relative;z-index:1">
    <div class="section-label">Empieza hoy</div>
    <h2 class="section-title">Tu primer servicio<br>con <em>10% de descuento</em></h2>
    <p>Agenda ahora y descubre por qué más de 4,000 familias y empresas confían en TouchClean para mantener sus espacios en perfectas condiciones.</p>
    <div class="cta-btns">
      <a href="#" class="btn-dark">Agendar limpieza →</a>
      <a href="tel:5512345678" class="btn-outline">📞 55 1234 5678</a>
    </div>
  </div>
</section>

<footer>
  <div class="footer-brand">
    <div class="nav-logo" style="color:var(--white)">Touch<span style="color:var(--yellow);font-style:italic">Clean</span></div>
    <p>Servicios y productos de limpieza profesional. Creemos que un espacio limpio es un espacio que inspira.</p>
  </div>
  <div class="footer-col">
    <h5>Servicios</h5>
    <ul><li><a href="#">Hogar</a></li><li><a href="#">Empresas</a></li><li><a href="#">Tapicería</a></li><li><a href="#">Post-obra</a></li></ul>
  </div>
  <div class="footer-col">
    <h5>Productos</h5>
    <ul><li><a href="#">Desengrasantes</a></li><li><a href="#">Multiusos</a></li><li><a href="#">Aromatizantes</a></li><li><a href="#">Kits Pro</a></li></ul>
  </div>
  <div class="footer-col">
    <h5>Contacto</h5>
    <ul><li><a href="tel:5512345678">55 1234 5678</a></li><li><a href="mailto:hola@touchclean.mx">hola@touchclean.mx</a></li><li><a href="#">WhatsApp</a></li><li><a href="#">Instagram</a></li></ul>
  </div>
  <div class="footer-bottom">
    <span>© 2026 TouchClean. Todos los derechos reservados.</span>
    <span>Hecho con 💛 en México</span>
  </div>
</footer>

<script>
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) setTimeout(() => entry.target.classList.add('visible'), i * 80);
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => observer.observe(el));

  document.querySelectorAll('.add-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      this.textContent = '✓';
      this.style.background = 'var(--blue-deep)';
      this.style.color = 'white';
      setTimeout(() => { this.textContent = '+'; this.style.background = ''; this.style.color = ''; }, 1500);
    });
  });
</script>
</body>
</html>