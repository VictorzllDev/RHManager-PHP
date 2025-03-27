<div class="p-4">
  <div class="p-4 border-none border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3 ">
      <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
          <div class="flex justify-between ">
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                  <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                  <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                </svg>
              </div>
              <div>
                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"><?= count($employees) ?></h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Funcionários Registrados</p>
              </div>
            </div>
            <div class="hidden">
              <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                </svg>
                42.5%
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
          <div class="flex justify-between ">
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                </svg>
              </div>
              <div>
                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"><?= count($trainings) ?></h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Treinamentos Realizados</p>
              </div>
            </div>
            <div class="hidden">
              <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                </svg>
                42.5%
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
          <div class="flex justify-between ">
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
              </div>
              <div>
                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"><?= count($trainings) ?></h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Treinamentos Vencidos</p>
              </div>
            </div>
            <div class="hidden">
              <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                </svg>
                42.5%
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex items-center justify-center h-full mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
      <div class="bg-white dark:bg-gray-800 relative w-full shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
          <div class="w-full md:w-1/2">

            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Treinamentos pendentes</h1>

          </div>
          <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <div class="flex items-center space-x-3 w-full md:w-auto">
              <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                  <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                  </li>
                </ul>
                <div class="py-1">
                  <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-4 py-3">Nome</th>
                <th scope="col" class="px-4 py-3">Funcionário</th>
                <th scope="col" class="px-4 py-3">Data de Realização</th>
                <th scope="col" class="px-4 py-3">Data de Expiração</th>
                <th scope="col" class="px-4 py-3">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($trainings as $training) : ?>
                <?php
                // verifica se o treinamento falta 30 dias para vencer e não foi realizado
                $isTrainingExpiringIn30Days = $training->expiration_date <= date('Y-m-d', strtotime('+30 days')) && $training->training_completed == 'f';

                // verifica se o treinamento já expirou
                $isTrainingExpired = $training->expiration_date < date('Y-m-d');

              // verificando se o treinamento e diferente que pendente para não mostrar na tabela
                if ($training->training_completed == 't' || $isTrainingExpired) {
                  continue;
                }

                // formata as datas
                $training->execution_date = date('d/m/Y', strtotime($training->execution_date));
                $training->expiration_date = date('d/m/Y', strtotime($training->expiration_date));

                ?>

                <tr class="border-b dark:border-gray-700">
                  <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">treinamento Vencido</th>
                  <td class="px-4 py-3"><?= $training->name ?></td>
                  <td class="px-4 py-3"><?= $training->execution_date ?></td>
                  <td class="px-4 py-3"><?= $training->expiration_date ?></td>
                  <td class="px-4 py-3">
                    <?php
                    $statusMap = [
                      't' => ['Realizado', 'bg-green-500'],
                      'f' => [$isTrainingExpired ? 'Expirado' : 'Pendente', $isTrainingExpired ? 'bg-red-500' : 'bg-yellow-500']
                    ];

                    [$trainingStatus, $trainingStatusClass] = $statusMap[$training->training_completed] ?? ['Pendente', 'bg-yellow-500'];
                    ?>
                    <div class="flex items-center">
                      <span class="<?= $trainingStatusClass ?> h-2.5 w-2.5 rounded-full mr-2"></span>
                      <p><?= $trainingStatus ?></p>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <!-- <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation"> -->
        <!--   <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> -->
        <!--     Showing -->
        <!--     <span class="font-semibold text-gray-900 dark:text-white">1-10</span> -->
        <!--     of -->
        <!--     <span class="font-semibold text-gray-900 dark:text-white">1000</span> -->
        <!--   </span> -->
        <!--   <ul class="inline-flex items-stretch -space-x-px"> -->
        <!--     <li> -->
        <!--       <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"> -->
        <!--         <span class="sr-only">Previous</span> -->
        <!--         <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> -->
        <!--           <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /> -->
        <!--         </svg> -->
        <!--       </a> -->
        <!--     </li> -->
        <!--     <li> -->
        <!--       <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a> -->
        <!--     </li> -->
        <!--     <li> -->
        <!--       <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a> -->
        <!--     </li> -->
        <!--     <li> -->
        <!--       <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a> -->
        <!--     </li> -->
        <!--     <li> -->
        <!--       <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a> -->
        <!--     </li> -->
        <!--     <li> -->
        <!--       <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a> -->
        <!--     </li> -->
        <!--     <li> -->
        <!--       <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"> -->
        <!--         <span class="sr-only">Next</span> -->
        <!--         <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> -->
        <!--           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /> -->
        <!--         </svg> -->
        <!--       </a> -->
        <!--     </li> -->
        <!--   </ul> -->
        <!-- </nav> -->
      </div>
    </div>
  </div>
</div>
