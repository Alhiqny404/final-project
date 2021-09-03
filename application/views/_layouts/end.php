<script src="<?=assets_dashboard() ?>plugins/chartjs/chart.min.js"></script>
<script src="<?=assets_dashboard() ?>pages/jquery.chartjs.init.js"></script>



<script>
  const male = document.querySelector('.male');
  const female = document.querySelector('.female');
  const male_female = document.querySelector('.male_female');
  const showTable = ($table)=> {
    if ($table == 'male') {
      male.classList.remove('hidden')
      female.classList.add('hidden')
      male_female.classList.add('hidden')
    } else if ($table == 'female') {
      female.classList.remove('hidden')
      male.classList.add('hidden')
      male_female.classList.add('hidden')
    } else {
      male_female.classList.remove('hidden')
      male.classList.add('hidden')
      female.classList.add('hidden')
    }
  }

</script>


</body>
</html>