<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section9QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 9,
                'text' => 'Why may a confined space be dangerous to work in?',
                'explanation' => 'There can be a range of hazards associated with confined spaces, and these can include all of those mentioned.',
                'options' => [
                    ['text' => 'There may not be sufficient working space', 'is_correct' => false],
                    ['text' => 'Air in the space may be unbreathable due to poisonous gas', 'is_correct' => false],
                    ['text' => 'Temperature and poor ventilation may affect the worker', 'is_correct' => false],
                    ['text' => 'All of the hazards mentioned', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'What must be considered first when planning to carry out work in a confined space?',
                'explanation' => 'Working outside will remove the risks of working in the confined space.',
                'options' => [
                    ['text' => 'Has the job been priced properly', 'is_correct' => false],
                    ['text' => 'Have the correct tools been arranged', 'is_correct' => false],
                    ['text' => 'Has sufficient manpower been allocated', 'is_correct' => false],
                    ['text' => 'Can the work be done from the outside', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'When working in a confined space, such as a sewer, what danger may occur?',
                'explanation' => 'Sewer gases can be inflammable and suffocating.',
                'options' => [
                    ['text' => 'Getting wet through', 'is_correct' => false],
                    ['text' => 'Boredom', 'is_correct' => false],
                    ['text' => 'Not enough time for the job to be done', 'is_correct' => false],
                    ['text' => 'Build-up of harmful gases', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'To determine the safety of the atmosphere in an excavation, which of the following is essential.',
                'explanation' => 'Use a suitable detector. Many dangerous gases have no smell and cannot be seen. Workers can be overcome in seconds in dangerous atmospheres.',
                'options' => [
                    ['text' => 'Sniffing the atmosphere after entry', 'is_correct' => false],
                    ['text' => 'Using a gas detector', 'is_correct' => true],
                    ['text' => 'Only entering for a short period to enable a quick escape', 'is_correct' => false],
                    ['text' => 'Looking for toxic gases', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'Before entering an excavation to start work, it must first be:',
                'explanation' => 'Excavation work is hazardous. A competent person, knowledgeable about how to reduce risks, notably from collapse of the walls, must inspect the excavation first.',
                'options' => [
                    ['text' => 'Inspected by a competent person', 'is_correct' => true],
                    ['text' => 'Covered over and left overnight', 'is_correct' => false],
                    ['text' => 'Filled with water then drained', 'is_correct' => false],
                    ['text' => 'Inspected by the HSE', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => "What is the purpose of using a 'permit to work' system?",
                'explanation' => 'A permit to work is a written system used to control certain types of hazardous work. They allow work to start only when site procedures have been clarified.',
                'options' => [
                    ['text' => 'To ensure the job is carried out by the quickest method', 'is_correct' => false],
                    ['text' => 'To help ensure a safe system of work', 'is_correct' => true],
                    ['text' => 'To ensure that the client will pay for the work', 'is_correct' => false],
                    ['text' => 'To enable tools and equipment to be properly checked before the commencement of work', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'Why may young people be more at risk on site?',
                'explanation' => "Health and Safety guidance lists young people as often being 'at particular risk', due to their lack of practical experience.",
                'options' => [
                    ['text' => 'There is no specific legislation applying to them', 'is_correct' => false],
                    ['text' => 'They are usually left to work alone to gain experience', 'is_correct' => false],
                    ['text' => 'There is no requirement to provide PPE to young people', 'is_correct' => false],
                    ['text' => 'They are inexperienced and may not recognise danger', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'You have to enter a manhole in which you know there are toxic gases. You have all the PPE but there does not appear to be a rescue plan in place. What should you do?',
                'explanation' => 'A rescue plan must be in place before anyone enters a confined space. This is one of the requirements of the Confined Spaces Regulations 1997.',
                'options' => [
                    ['text' => 'Just get on and do the job, it will probably be alright', 'is_correct' => false],
                    ['text' => 'Plan to carry out the job in short bursts', 'is_correct' => false],
                    ['text' => 'Do not enter the manhole until a rescue plan and rescue equipment are in place', 'is_correct' => true],
                    ['text' => 'Ask your mate to stand-by at the top of the manhole with a length of rope', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'You have to enter a manhole in which you believe there could be toxic gases. You have not been provided with any Respiratory Protective Equipment (RPE). What should you do?',
                'explanation' => 'An employer must provide all necessary personal protective equipment and respiratory protective equipment when an employee is required to enter a confined space. This is one of the requirements of the Confined Spaces Regulations 1997.',
                'options' => [
                    ['text' => 'Tell your supervisor that you will need RPE, and if necessary, training in confined space working', 'is_correct' => true],
                    ['text' => 'Sniff the atmosphere in the manhole to see if you can smell harmful gases', 'is_correct' => false],
                    ['text' => 'Look into the manhole to see if you can see any harmful gases', 'is_correct' => false],
                    ['text' => 'Just get on with the job, and accept the risks', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'While digging a trench, you uncover a length of yellow marker tape at a depth of about 150mm. What does the presence of the marker tape mean?',
                'explanation' => 'The coloured tape indicates that there are buried services below the route of the tape.',
                'options' => [
                    ['text' => 'The area has a high water-table and precautions must be taken to prevent an in-rush of water', 'is_correct' => false],
                    ['text' => 'There is a buried electrical cable and further excavation must be carried out with care', 'is_correct' => true],
                    ['text' => 'There is contaminated soil below the level of the marker tape and all excavation must stop', 'is_correct' => false],
                    ['text' => 'The excavation has reached a depth where the sides must now be supported', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => "A Cable Avoidance Tool (C.A.T.) and a 'Genny' (generator) can be used successfully to locate underground cables by whom:",
                'explanation' => 'Equipment used to locate buried services must only be used by people who have been trained to use it.',
                'options' => [
                    ['text' => 'Anyone', 'is_correct' => false],
                    ['text' => 'A competent person after training', 'is_correct' => true],
                    ['text' => 'Any electricity company employee', 'is_correct' => false],
                    ['text' => 'The site foreman', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'When exposing underground power cables, which method of excavation should you use?',
                'explanation' => 'Hand-held power tools and mechanical excavators should not be used too close to underground services and hand digging should be carried out with care.',
                'options' => [
                    ['text' => 'A 360 degree excavator with rubber tyres', 'is_correct' => false],
                    ['text' => 'A pickaxe', 'is_correct' => false],
                    ['text' => 'Hand digging', 'is_correct' => true],
                    ['text' => 'A kango hammer', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'When do special precautions need to be taken when working near overhead electric power lines?',
                'explanation' => "Actual contact with a power line is not necessary to result in an electric shock as a close approach may allow 'flashover' to occur. HSE publication GS6 gives advice on procedures to avoid such danger.",
                'options' => [
                    ['text' => 'Only if cranes etc. are being used', 'is_correct' => false],
                    ['text' => 'Only if someone could touch a line with their bare hands', 'is_correct' => false],
                    ['text' => 'Only if plant has to pass under the lines', 'is_correct' => false],
                    ['text' => 'Whenever work areas will be near or beneath the lines', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'When working alone:',
                'explanation' => 'Employees should adhere to safe working arrangements put in place by their employer. When working alone, such arrangements should include informing a responsible person of your location periodically.',
                'options' => [
                    ['text' => 'Make sure someone responsible knows where you are', 'is_correct' => true],
                    ['text' => 'You can do away with protective equipment', 'is_correct' => false],
                    ['text' => "Don't bother anyone if you have a problem, always sort it out yourself", 'is_correct' => false],
                    ['text' => 'Wear headphones, it will make the day go more quickly', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'You have to walk across a site several times a day, but have to dodge a lot of site traffic. The first thing you should do is:',
                'explanation' => "Pedestrian routes should have been set up to keep people and vehicles apart, so inform your employer if the system is not working. Don't hitch rides on vehicles unless safe seating is provided.",
                'options' => [
                    ['text' => 'Have a word with the drivers', 'is_correct' => false],
                    ['text' => 'Walk around the edges of the site to keep out of the way', 'is_correct' => false],
                    ['text' => 'Tell your supervisor about the danger', 'is_correct' => true],
                    ['text' => "Jump on the back of a vehicle if you can, it's safer than walking", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 9,
                'text' => 'A mobile plant operator can let you ride in the machine:',
                'explanation' => "Don't hitch rides on vehicles unless safe seating is provided.",
                'options' => [
                    ['text' => 'If you have a long way to go', 'is_correct' => false],
                    ['text' => 'If it is raining', 'is_correct' => false],
                    ['text' => 'If it is designed to carry passengers', 'is_correct' => true],
                    ['text' => 'At any time', 'is_correct' => false],
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