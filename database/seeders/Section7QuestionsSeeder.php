<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section7QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 7,
                'text' => 'Most deaths on site are caused by:',
                'explanation' => 'Although the other dangers can kill or cause injury, falling from height is the bigger cause of fatalities.',
                'options' => [
                    ['text' => 'Vehicle movements', 'is_correct' => false],
                    ['text' => 'Falling from height', 'is_correct' => true],
                    ['text' => 'Solvent inhalation', 'is_correct' => false],
                    ['text' => 'Chemical burns', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'The type of accident that kills most construction site workers is:',
                'explanation' => 'Although the other dangers can kill or cause injury, falling from height is the biggest cause of fatalities.',
                'options' => [
                    ['text' => 'Being hit by falling objects', 'is_correct' => false],
                    ['text' => 'Falling from heights', 'is_correct' => true],
                    ['text' => 'Trench collapses', 'is_correct' => false],
                    ['text' => 'Electrical accident', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'The main cause of deaths on construction sites is...',
                'explanation' => null,
                'options' => [
                    ['text' => 'Fire', 'is_correct' => false],
                    ['text' => 'Falls from height', 'is_correct' => true],
                    ['text' => 'Being run over by plant', 'is_correct' => false],
                    ['text' => 'Excavation collapse', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'How many people should be working on a ladder at one time?',
                'explanation' => 'Only one person should be working on a ladder, although another person may be footing it, for extra stability.',
                'options' => [
                    ['text' => 'One on each section of an extension ladder', 'is_correct' => false],
                    ['text' => 'One', 'is_correct' => true],
                    ['text' => 'Two', 'is_correct' => false],
                    ['text' => 'Three if it is long enough', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Ladders should be set at a slope of approximately:',
                'explanation' => null,
                'options' => [
                    ['text' => '1 out for every 3 up', 'is_correct' => false],
                    ['text' => '4 out for every 1 up', 'is_correct' => false],
                    ['text' => '1 out for every 1 up', 'is_correct' => false],
                    ['text' => '1 out for every 4 up', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Why should aluminium ladders be kept away from wet lime or cement?',
                'explanation' => 'Aluminium can corrode in certain situations, notably if in prolonged contact with lime or cement.',
                'options' => [
                    ['text' => 'It will stain your clothes', 'is_correct' => false],
                    ['text' => 'The ladder may become statically charged', 'is_correct' => false],
                    ['text' => 'It may corrode the ladder', 'is_correct' => true],
                    ['text' => 'It will stain the aluminium', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Before being used, a ladder should be inspected:',
                'explanation' => 'The user needs to be satisfied that the ladder is in a safe condition before using it.',
                'options' => [
                    ['text' => 'By the foreman', 'is_correct' => false],
                    ['text' => 'By the user', 'is_correct' => true],
                    ['text' => 'By the manufacturer', 'is_correct' => false],
                    ['text' => 'By the Safety Officer', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Ladders should be:',
                'explanation' => 'All the measures listed are required to reduce the risk of falls.',
                'options' => [
                    ['text' => 'In good condition', 'is_correct' => false],
                    ['text' => 'Tied or footed', 'is_correct' => false],
                    ['text' => 'Tied or footed AND at the right angle AND in good condition', 'is_correct' => true],
                    ['text' => 'At the right angle', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'A ladder giving access to a scaffold can generally be safely used, provided that:',
                'explanation' => 'Access ladders should extend at least 1 metre above the landing point to provide a safe handhold.',
                'options' => [
                    ['text' => 'The foot of the ladder is firmly wedged', 'is_correct' => false],
                    ['text' => 'It does not move when you climb up it', 'is_correct' => false],
                    ['text' => 'Any broken rungs are clearly marked', 'is_correct' => false],
                    ['text' => 'It is tied and extends at least 1 metre above the platform', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'What is the ideal angle for a ladder against a wall and floor?',
                'explanation' => 'The correct angle for a ladder is 75 degrees, which can be judged using the angle indicator marked on the stiles of some ladders or using the 1 in 4 rule.',
                'options' => [
                    ['text' => 'One metre up for every metre out from the wall', 'is_correct' => false],
                    ['text' => 'One metre up for every two metres out from the wall', 'is_correct' => false],
                    ['text' => 'Two metres up for every metre out from the wall', 'is_correct' => false],
                    ['text' => 'Four metres up for every metre out from the wall.', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'The rung of a wooden ladder has started to split, what should you do?',
                'explanation' => 'It is essential that supervisors are aware of faulty or damaged equipment.',
                'options' => [
                    ['text' => 'Do not use it, tell your supervisor', 'is_correct' => true],
                    ['text' => 'Cut the bad bit out', 'is_correct' => false],
                    ['text' => 'Tape it up', 'is_correct' => false],
                    ['text' => 'Jump on it to see if it holds your weight', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Ladders should not be painted because:',
                'explanation' => null,
                'options' => [
                    ['text' => 'Regular repainting will be necessary', 'is_correct' => false],
                    ['text' => 'The paint will make them slippery to use', 'is_correct' => false],
                    ['text' => 'The paint may not be suitable on metal parts of the ladder', 'is_correct' => false],
                    ['text' => 'The paint may cover a defect or damaged part of the ladder', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'When can you work from a ladder?',
                'explanation' => 'Ladders are primarily means of access, not workplaces. They can be worked from, but only if the use of other, more suitable, work equipment is not appropriate and the task is of low risk and of short duration.',
                'options' => [
                    ['text' => 'For short periods and then only if it is safe to do so', 'is_correct' => true],
                    ['text' => 'When it is long enough', 'is_correct' => false],
                    ['text' => 'When it is available', 'is_correct' => false],
                    ['text' => 'When not being used for access', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'When working above public areas, what should be considered?',
                'explanation' => 'There is a significant risk to the public from falling materials, if this is not considered before and during work.',
                'options' => [
                    ['text' => 'Preventing complaints from the public', 'is_correct' => false],
                    ['text' => 'The danger of falling materials', 'is_correct' => true],
                    ['text' => 'Keeping the job going', 'is_correct' => false],
                    ['text' => 'Keeping the areas open to the public', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'A scaffold tower must be erected by:',
                'explanation' => 'There are a number of organizations that provide training for the safe erection and use of scaffold towers.',
                'options' => [
                    ['text' => 'A trained and competent person', 'is_correct' => true],
                    ['text' => 'The hire company who supply it', 'is_correct' => false],
                    ['text' => 'The site foreman', 'is_correct' => false],
                    ['text' => 'Senior site staff', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'What is the minimum height of the top guard-rail of a scaffold above the edge from which someone is liable to fall?',
                'explanation' => 'This is a requirement of the Work at Height Regulations 2005.',
                'options' => [
                    ['text' => '470mm', 'is_correct' => false],
                    ['text' => '910mm', 'is_correct' => false],
                    ['text' => '950mm', 'is_correct' => true],
                    ['text' => '2 metres', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'A working platform used for construction work, and from which a person could fall 2 metres or more, must not be used unless it has been inspected (and a report is subsequently prepared) by a competent person:',
                'explanation' => 'Under these specific circumstances a report is required to be prepared by the competent person and given to the person for whom the inspection was done (e.g. the site manager). This is in addition to the more general requirement to inspect equipment for work at height: prior to use in that position (or site if it is mobile); following exceptional circumstances (e.g. high winds); and at suitable intervals.',
                'options' => [
                    ['text' => 'Only after an accident', 'is_correct' => false],
                    ['text' => 'That day', 'is_correct' => false],
                    ['text' => 'Within the previous seven days', 'is_correct' => true],
                    ['text' => 'Within the previous month', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'On a mobile elevating work platform, what should you attach your safety harness to?',
                'explanation' => 'The priority is to stay within the platform (which is the safest place) and in any event you cannot be sure of the strength of other fixtures.',
                'options' => [
                    ['text' => 'A secure anchorage point inside the platform', 'is_correct' => true],
                    ['text' => 'A strong part of the structure you are working on', 'is_correct' => false],
                    ['text' => 'The boom of the machine', 'is_correct' => false],
                    ['text' => 'A nearby pipe or scaffold', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'You have been asked to operate a cherry-picker (mobile elevated work platform) when it is very windy. What should your FIRST consideration be?',
                'explanation' => 'The priority in safety is eliminating risk at source - in this case by not working in dangerous conditions - rather than trying to stay safe by using protective equipment.',
                'options' => [
                    ['text' => 'Wear a safety harness and clip it to the structure that you are working on', 'is_correct' => false],
                    ['text' => 'Does the wind-speed make it unsafe to use the machine', 'is_correct' => true],
                    ['text' => 'Wear an extra layer of clothing to keep warm', 'is_correct' => false],
                    ['text' => 'Tie all light-weight objects to the hand-rails of the basket', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'If you have to work at height and it is not possible to erect a scaffold, or use any other type of working platform or mobile elevating work platform, then you should:',
                'explanation' => 'The harness will greatly reduce the likelihood of injury if you fall.',
                'options' => [
                    ['text' => 'Work without fall protection, provided you have a mate with you', 'is_correct' => false],
                    ['text' => 'Wear a harness and lanyard at all times', 'is_correct' => true],
                    ['text' => 'Work without fall protection, provided the weather is not too windy', 'is_correct' => false],
                    ['text' => 'Work without fall protection at all times when no one else is about', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'When working on a roof that has fragile, clear-plastic panels, what is the best way of preventing falls through the panels?',
                'explanation' => 'Protection from falling through openings and fragile roof lights can be provided by barriers or with covers which can be secured or labelled with a warning.',
                'options' => [
                    ['text' => 'Make sure that everyone is told where the panels are and to avoid treading on them', 'is_correct' => false],
                    ['text' => 'Cover the fragile panels with a strong material and secure the covers to stop them being dislodged', 'is_correct' => true],
                    ['text' => 'Remove the panels carefully to leave an open space.', 'is_correct' => false],
                    ['text' => "It shouldn't be necessary to do anything, everyone knows the dangers", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'When working on a roof that has fragile, clear-plastic panels, what is the best way of preventing falls through the panels?',
                'explanation' => 'Fragile roofs must be made safe to work on, before work commences.',
                'options' => [
                    ['text' => 'It is safe to walk on the purlins', 'is_correct' => false],
                    ['text' => 'Walk straight across the roof to where you need to get to', 'is_correct' => false],
                    ['text' => 'As long as you avoid any fragile areas it is safe', 'is_correct' => false],
                    ['text' => 'Crawling boards should always be used', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Half the deaths on construction sites are caused by which one of the following?',
                'explanation' => 'This is shown by HSE statistics.',
                'options' => [
                    ['text' => 'Falls from heights', 'is_correct' => true],
                    ['text' => 'Electrical misuse', 'is_correct' => false],
                    ['text' => 'Working in trenches/confined spaces', 'is_correct' => false],
                    ['text' => 'Misuse of plant and machinery', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'What should you do if your work activity requires you to wear a full body safety harness and one is not available?',
                'explanation' => 'Always advise the supervisor if you do not have the correct PPE.',
                'options' => [
                    ['text' => 'Make a harness from items found on site', 'is_correct' => false],
                    ['text' => 'Carry on working and hope that everything will be alright', 'is_correct' => false],
                    ['text' => 'Borrow a harness from a colleague', 'is_correct' => false],
                    ['text' => 'Stop work immediately and tell your supervisor that you do not have the correct PPE', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Under what circumstances do the Work at Height Regulations permit a stepladder to be used on site?',
                'explanation' => 'The WAH Regulations have not banned the use of ladders or stepladders, but they should be used sensibly.',
                'options' => [
                    ['text' => 'Never-stepladders are banned', 'is_correct' => false],
                    ['text' => 'At any time', 'is_correct' => false],
                    ['text' => "Provided you can't fall 2 metres or more", 'is_correct' => false],
                    ['text' => 'Only when a risk assessment shows that safer alternatives have been ruled out and the task is of low risk and of short duration', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'What is the best method of securing a ladder?',
                'explanation' => 'Tying the ladder is the safest option, making sure both stiles are tied.',
                'options' => [
                    ['text' => 'Tying it to a suitable point', 'is_correct' => true],
                    ['text' => 'Using an effective ladder stability device', 'is_correct' => false],
                    ['text' => 'Wedging the ladder (e.g. against a wall)', 'is_correct' => false],
                    ['text' => 'Having the ladder footed', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Of the following, which is the POOREST method of securing a ladder?',
                'explanation' => 'Footing a ladder is the last resort and should be avoided. Other more suitable access equipment should be used where practicable.',
                'options' => [
                    ['text' => 'Securing the base of the ladder', 'is_correct' => false],
                    ['text' => 'Tying the ladder', 'is_correct' => false],
                    ['text' => 'Having someone foot the ladder', 'is_correct' => true],
                    ['text' => 'Using a ladder stability device', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 7,
                'text' => 'Prior to moving a mobile tower scaffold, the platform height should reduced to a maximum of:',
                'explanation' => 'This figure is quoted in guidance published by the HSE and PASMA. Checks should also be made that there are no obstructions overhead, the ground is firm, level and free from potholes, it is not too windy and there are no people or materials on the tower.',
                'options' => [
                    ['text' => '2 metres', 'is_correct' => false],
                    ['text' => '3 metres', 'is_correct' => false],
                    ['text' => '4 metres', 'is_correct' => true],
                    ['text' => '5 metres', 'is_correct' => false],
                ],
            ],
        ];

        foreach ($questions as $questionData) {
            $question = Question::create([
                'section_id' => $questionData['section_id'],
                'text' => $questionData['text'],
                'explanation' => $questionData['explanation'],
            ]);

            foreach ($questionData['options'] as $optionData) {
                $question->options()->create($optionData);
            }
        }
    }
}