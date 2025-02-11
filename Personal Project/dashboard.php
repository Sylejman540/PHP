<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task Mastery | #1 Task Management Platform</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!-- ===== Header / Navigation ===== -->
  <header class="header">
    <div class="logo">
      <img src="images/tasks.png" alt="Tasks" width="10%">
    </div>
    <nav class="nav">
      <button class="btn-secondary" a href="#contact">Contact Sales</button>
      <button class="btn-primary" onclick="location.href='index.php'">Get Started</button>
    </nav>
  </header>

  <!-- ===== Hero Section ===== -->
  <section class="hero">
    <div class="hero-content">
      <h1>Work smarter with the<br><span>#1 task management platform</span></h1>
      <p class="subtitle">
        Plan, manage, and track all your team’s tasks in one flexible platform.<br>
        What do you want to manage?
      </p>

      <!-- Category “chips” -->
      <div class="chips-container">
        <label class="chip">
          <input type="checkbox" />
          <span>Task management</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Project management</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Tasks & to-do’s</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Time tracking</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Goals & strategy</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Business operations</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Client projects</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Resource management</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Collaboration tools</span>
        </label>
        <label class="chip">
          <input type="checkbox" />
          <span>Create your own</span>
        </label>
      </div>

      <!-- Big CTA button -->
      <button class="btn-primary cta-button" onclick="location.href='index.php'">Get Started →</button>
      <p class="cta-caption">Free forever. No credit card.</p>
    </div>
  </section>

  <!-- ===== Testimonials Section ===== -->
  <section class="testimonials">
    <h2>Why customers <span>love</span> Task Mastery</h2>

    <div class="testimonial-card">
      <blockquote>
        “Task Mastery has been an incredible game-changer for our business efficiency.”
      </blockquote>
      <div class="testimonial-author">
        <strong>Greg A.</strong> | Reviewed on G2
      </div>
      <div class="stars">
        ★★★★★
      </div>
    </div>

    <!-- Add more testimonial-cards if you like -->
    <div class="testimonial-card">
      <blockquote>
        “We improved team collaboration and cut our project planning time in half!”
      </blockquote>
      <div class="testimonial-author">
        <strong>Sarah K.</strong> | Reviewed on Capterra
      </div>
      <div class="stars">
        ★★★★★
      </div>
    </div>
  </section>

  <!-- ===== Footer ===== -->
  <footer class="footer">
    <p>Trusted by 225,000+ customers worldwide</p>
    <p>&copy; 2025 Task Mastery</p>
  </footer>


  <div class="contact">

    <h1>Get <span>In</span> Touch <span>With</span> Us</h1>
    <div class="input">
      <label for="text"></label>
      <input type="text" id="name" placeholder="Name">

      <label for="text"></label>
      <input type="text" id="surname" placeholder="Surname">

      <label for="email"></label>
      <input type="email" id="email" placeholder="Email">
    
      <button>Submit</button>
</div>
  </div>
</body>
</html>
