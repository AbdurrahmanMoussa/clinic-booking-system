<div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 py-6">

    <x-dashboard-card title="View Appointments" icon="" :route="route('doctor.view-appointment-calendar')"
        description="Check your upcoming and past appointments." />
    <x-dashboard-card title="Update Appointments" icon="" :route="route('doctor.dashboard')"
        description="update your upcoming and past appointments." />
    <x-dashboard-card title="View Scheduled Patient Information" icon="" :route="route('doctor.dashboard')"
        description="Check the detailed info about the Patient" />
    <x-dashboard-card title="Manage Your Profile" icon="" :route="route('doctor.dashboard')"
        description="Update your personal information." />


</div>
