<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $sections = ['Helpdesk', 'VOIP', 'Application', 'Network','Management'];
        $section_descriptions = [
            'Helpdesk' => 'Provide first-level technical support to end-users by diagnosing and resolving software, hardware, and network-related issues. Responsible for tracking support requests, troubleshooting, escalating issues to higher-level support when necessary, and ensuring timely resolution',

            'VOIP' => 'Manage and support VoIP telephony systems,
         ensuring proper setup, configuration, and maintenance. Responsible for call routing, troubleshooting communication issues,
         and optimizing the performance of telecommunication systems.',

            'Application' => 'Responsible for managing, maintaining, and providing support for various business applications. This includes software installation, updates, troubleshooting, and customization to ensure business continuity and user satisfaction',

            'Network' => "Oversee the organization's network infrastructure, ensuring efficient and secure connectivity for all users. This includes managing routers, switches, firewalls, and monitoring network performance to identify and resolve bottlenecks.",

            'Management' => 'Responsible for overseeing the IT department, setting goals, and ensuring that the team meets its objectives. This includes managing staff, budgets, and projects to ensure the efficient operation of the IT department.'
        ];
        foreach ($sections as $section) {
            \App\Models\Section::create([
                'title' => $section,
                'section description' => $section_descriptions[$section]
            ]);
        }
    }
}
