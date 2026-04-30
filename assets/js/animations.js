// Elridhma — Scroll Animations via Intersection Observer
(function () {
  'use strict';

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  function initObserver() {
    document.querySelectorAll('.fade-up').forEach(function (el) {
      observer.observe(el);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initObserver);
  } else {
    initObserver();
  }

  // FAQ accordion (vanilla)
  document.addEventListener('click', function (e) {
    var trigger = e.target.closest('.faq-trigger');
    if (!trigger) return;
    var body = trigger.nextElementSibling;
    var isOpen = trigger.classList.contains('open');

    // Close all open ones in same container
    var container = trigger.closest('.faq-list') || document;
    container.querySelectorAll('.faq-trigger.open').forEach(function (t) {
      t.classList.remove('open');
      t.nextElementSibling.classList.remove('open');
    });

    if (!isOpen) {
      trigger.classList.add('open');
      body.classList.add('open');
    }
  });
})();
