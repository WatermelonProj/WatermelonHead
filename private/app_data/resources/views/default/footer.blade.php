  <footer>
    <hr/>
    <div class="row">
      <div class="medium-48 column textCenter">&copy; <?php echo date("Y"); ?> Watermelon Project | Todos os direitos reservados.</div>
    </div>
  </footer>

  <script src="/bower_components/jquery/dist/jquery.js"></script>
  <script src="/bower_components/what-input/what-input.js"></script>
  <script src="/bower_components/foundation-sites/dist/foundation.js"></script>
  @yield('script:import')
  <script src="/js/site.js"></script>
  @yield('script')
  </body>
</html>
