<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'Helpdesk Technician' => [
                'Section' => 'Helpdesk',
                'Responsibilities' => "Respond to user queries and requests via phone, email, or helpdesk software., Provide basic troubleshooting for IT systems and applications., Install and configure computer systems, software, and hardware., Escalate unresolved issues to specialized support teams."
            ],
            'Helpdesk Team Lead' => [
                'Section' => 'Helpdesk',
                'Responsibilities' => "Oversee helpdesk technicians., Ensure all tickets are handled in a timely manner., Provide guidance and escalation support for complex issues., Conduct performance evaluations and training for the team."
            ],
            'VOIP Engineer' => [
                'Section' => 'VOIP',
                'Responsibilities' => "Install, configure, and maintain VoIP infrastructure., Monitor VoIP system performance and resolve any communication issues., Collaborate with network teams to ensure seamless integration., Provide support for phone systems, softphones, and video conferencing tools."
            ],
            'VOIP Team Lead' => [
                'Section' => 'VOIP',
                'Responsibilities' => "Lead the VOIP team in managing and maintaining telephony infrastructure., Provide high-level troubleshooting for complex issues., Coordinate with the network team for VOIP integration., Ensure the team meets performance goals."
            ],
            'Application Support Specialist' => [
                'Section' => 'Application',
                'Responsibilities' => "Support users in using applications and provide troubleshooting when needed., Implement software updates, patches, and customizations., Collaborate with other departments to improve software functionality and performance., Ensure application security and data integrity."
            ],
            'Application Team Lead' => [
                'Section' => 'Application',
                'Responsibilities' => "Supervise the application support team., Ensure application systems are optimized and running smoothly., Provide leadership in handling escalated issues., Manage software updates and implementation processes."
            ],
            'Network Specialist' => [
                'Section' => 'Network',
                'Responsibilities' => "Configure and manage network hardware (routers, switches, firewalls, etc.), Monitor network performance and troubleshoot issues as they arise., Implement security protocols to protect network integrity., Work with other teams to integrate network-related services like VPNs and remote access."
            ],
            'Network Team Lead' => [
                'Section' => 'Network',
                'Responsibilities' => "Oversee the network team and infrastructure., Lead network design and security implementation., Provide advanced troubleshooting and optimization strategies., Ensure network availability and performance metrics are met."
            ],
            'Supervisor' => [
                'Section' => 'Management',
                'Responsibilities' => "Supervise multiple teams including Helpdesk, VOIP, Application, and Network., Provide strategic direction and coordination across sections., Resolve cross-departmental issues and bottlenecks., Ensure compliance with IT standards and procedures."
            ],
            'Admin' => [
                'Section' => 'Management',
                'Responsibilities' => "Manage administrative tasks across the IT department., Maintain documentation and records., Assist in planning and scheduling activities., Support communication and coordination between different teams."
            ]
        ];
        foreach ($positions as $title => $position) {
            $section = \App\Models\Section::where('title', $position['Section'])->first();
            \App\Models\Position::create([
                'job_title' => $title,
                'section_id' => $section->id,
                'job_description' => $position['Responsibilities']
            ]);
        }
    
    }
}
