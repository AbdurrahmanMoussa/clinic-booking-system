<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <title>Contact Us - RAS Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white transition-colors duration-500 min-h-screen flex items-center justify-center px-4 py-20">

  <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-10 max-w-2xl w-full transition-colors duration-500">
    <h1 class="text-4xl font-extrabold mb-8 text-blue-700 dark:text-blue-400 text-center">
      Contact Us
    </h1>

    <p class="text-center text-gray-600 dark:text-gray-300 mb-10 leading-relaxed">
      We're happy to assist you. Please reach out using the contact information below.
    </p>

    <div class="space-y-8 text-lg">

      <!-- Location -->
      <div class="flex items-center space-x-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414a4 4 0 10-5.657 5.657l4.243 4.243a8 8 0 1011.314-11.314l-4.243 4.243z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span>Nepean, Ottawa, ON</span>
      </div>

      <!-- Email -->
      <div class="flex items-center space-x-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 0l-4-4m4 4l-4 4" />
        </svg>
        <span>
          <a href="mailto:clinictest@algonquinlive.com" class="text-blue-600 dark:text-blue-300 hover:underline">
            clinictest@algonquinlive.com
          </a>
        </span>
      </div>

    </div>

    <p class="mt-12 text-center text-sm text-gray-500 dark:text-gray-400">
      We usually respond within 1–2 business days.
    </p>
  </div>

</body>
</html>
