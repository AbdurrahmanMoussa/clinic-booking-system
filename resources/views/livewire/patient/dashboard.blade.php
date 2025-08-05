    <!-- HEADER / NAVBAR -->


    <div class="space-y-6 p-6">

        <!-- DASHBOARD CARDS -->
        <div class="grid gap-4 md:grid-cols-2">
            <div class="hover:scale-[1.01] transition duration-300">
                 <x-dashboard-card 
                title="View Appointments" 
                icon="fas fa-calendar" 
                :route="route('patient.book-appointment-calendar')"
                description="Check your upcoming and past appointments." />
            </div>


<div class="rounded-2xl border border-blue-600 bg-blue-950 hover:bg-blue-900 hover:shadow-xl hover:scale-[1.01] transition duration-300">
    <x-dashboard-card 
        title="Upcoming Appointment"
        icon="fas fa-stethoscope"
        :route="route('patient.book-appointment-calendar')"
        :description="$upcoming 
            ? 'Dr. ' . $upcoming->doctor->last_name . ' on ' . \Carbon\Carbon::parse($upcoming->timeslot->start_time)->format('M d, h:i A') 
            : 'No upcoming appointments'"
    />
</div>

        
        
            <div class="hover:scale-[1.01] transition duration-300">
            <x-dashboard-card 
                title="Manage Profile" 
                icon="fas fa-user-cog" 
                :route="route('patient.dashboard')"
                description="Update your personal information." />
            </div>


        </div>
    </div>

