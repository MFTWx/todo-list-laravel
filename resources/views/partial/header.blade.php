<div class="flex flex-wrap">
    <section class="relative mx-auto">
      <nav class="flex justify-between bg-custom1 text-custom4 w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center justify-between">
          <a class="text-1xl font-bold font-heading" href="https://github.com/MFTWx/todo-list-laravel" target="_blank">
            Personal To Do List
          </a>
          <p class="text-1xl md:flex px-4 font-bold space-x-12 cursor-default">
            <span id="clock"></span>
          </p>

          <div class="xl:flex items-center space-x-5">
            <p class="text-1xl font-bold font-heading cursor-default" href="#">
                © Maleo Farrel - 2602076784
              </p>
          </div>
        </div>
      </nav>
    </section>
  </div>

  <script>
    const today = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };

    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const date = today.toLocaleDateString('en-US', options)
        const timeString = `${date} - ${hours}:${minutes}:${seconds}`;
        document.getElementById('clock').textContent = timeString;
    }

    setInterval(updateClock, 1000);
    updateClock();

</script>