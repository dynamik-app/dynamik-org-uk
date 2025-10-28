<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section8QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 8,
                'text' => 'What do the letters SWL stand for?',
                'explanation' => 'Machinery and accessories for lifting loads should be clearly marked to indicate their safe working loads.',
                'options' => [
                    ['text' => 'Safe working level', 'is_correct' => false],
                    ['text' => 'Satisfactory weight limit', 'is_correct' => false],
                    ['text' => 'Satisfactory working limit', 'is_correct' => false],
                    ['text' => 'Safe working load', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'Who should operate plant and equipment on site?',
                'explanation' => 'Never operate plant or equipment unless you have been trained and are authorised to do so.',
                'options' => [
                    ['text' => 'Only people over 18 years of age', 'is_correct' => false],
                    ['text' => 'Trained and authorised employees only', 'is_correct' => true],
                    ['text' => 'An employee holding a full driving licence', 'is_correct' => false],
                    ['text' => 'Any experienced employee', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What hazard is created when the head of a cold chisel mushrooms?',
                'explanation' => 'This question is looking for the hazard, which is the situation that can cause harm to people.',
                'options' => [
                    ['text' => 'Reduced striking area', 'is_correct' => false],
                    ['text' => 'Softens the impact', 'is_correct' => false],
                    ['text' => 'Flying steel splinters', 'is_correct' => true],
                    ['text' => 'Damage to the hammer head', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'Any damaged equipment must be:',
                'explanation' => 'It is essential that supervisors are aware of faulty or damaged equipment.',
                'options' => [
                    ['text' => 'Reported to your supervisor', 'is_correct' => true],
                    ['text' => 'Thrown away immediately', 'is_correct' => false],
                    ['text' => 'Labelled as damaged before use', 'is_correct' => false],
                    ['text' => 'Locked up so no one can use it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'The electric drill you are about to use has a faulty on/off switch. What action should you take?',
                'explanation' => 'It is essential that supervisors are aware of faulty or damaged equipment.',
                'options' => [
                    ['text' => 'Try and fix the fault', 'is_correct' => false],
                    ['text' => 'Find another machine and carry on working', 'is_correct' => false],
                    ['text' => 'Remove it from use and tell your supervisor', 'is_correct' => true],
                    ['text' => 'Tape the switch on to keep it running and carry on working', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'The power hand tool you are about to use has burn marks visible on the cable. What should you do?',
                'explanation' => 'It is essential that supervisors are aware of faulty or damaged equipment.',
                'options' => [
                    ['text' => 'Tape over the affected area and continue', 'is_correct' => false],
                    ['text' => 'Tell your supervisor about the defect and do not use the tool', 'is_correct' => true],
                    ['text' => "Obtain another machine and carry on, but don't tell anyone", 'is_correct' => false],
                    ['text' => 'Carry on and get the job done', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'Your supervisor asks you to use a powered hand-tool which has a rotating blade. You notice that the guard is missing from the blade. What do you do?',
                'explanation' => 'It is essential that supervisors are aware of faulty or damaged equipment.',
                'options' => [
                    ['text' => "Use the tool anyway, you haven't had an accident with it before", 'is_correct' => false],
                    ['text' => 'Remove it from use and tell your supervisor', 'is_correct' => true],
                    ['text' => 'Try to make an improvised guard yourself', 'is_correct' => false],
                    ['text' => 'Contact the manufacturer of the tool', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'Hand and power tools must be:',
                'explanation' => 'Tools must not create a risk to the user or others. This means they must be suitable and kept in good condition. This requires inspection before use.',
                'options' => [
                    ['text' => 'The best that you can buy', 'is_correct' => false],
                    ['text' => 'Made available when needed', 'is_correct' => false],
                    ['text' => "In the company's colours", 'is_correct' => false],
                    ['text' => 'Suitable for the task and regularly inspected', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'When should visual checks of portable hand-held equipment be made by the user?',
                'explanation' => 'The user needs to be satisfied that the tool has no obvious defect before use.',
                'options' => [
                    ['text' => 'When a replacement is needed', 'is_correct' => false],
                    ['text' => 'Monthly', 'is_correct' => false],
                    ['text' => 'Weekly', 'is_correct' => false],
                    ['text' => 'Each time it is used', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What precaution should you take before adjusting an electrical tool?',
                'explanation' => 'Do not adjust tools which could still be live or operate.',
                'options' => [
                    ['text' => 'Check the lead is not twisted or knotted', 'is_correct' => false],
                    ['text' => 'Wear safety footwear with steel toe caps', 'is_correct' => false],
                    ['text' => 'Disconnect from the power source', 'is_correct' => true],
                    ['text' => 'Wear the correct personal protective equipment', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'An electric drill is to be used. Before use, who should carry out a check on the tool?',
                'explanation' => 'The user needs to be satisfied that the tool has no obvious defect before use.',
                'options' => [
                    ['text' => 'Storeman', 'is_correct' => false],
                    ['text' => 'Electrician', 'is_correct' => false],
                    ['text' => 'Foreman', 'is_correct' => false],
                    ['text' => 'User', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What action should you take if an electric drill cuts out while you are using it?',
                'explanation' => 'The drill may be faulty. If so, tell your supervisor and remove the drill from service.',
                'options' => [
                    ['text' => 'Shake it about a bit', 'is_correct' => false],
                    ['text' => 'Put it back into the tool box', 'is_correct' => false],
                    ['text' => 'Switch the power off and on', 'is_correct' => false],
                    ['text' => 'Remove it from use and tell your supervisor', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'If an electric drill gives off blue smoke from the motor, you should:',
                'explanation' => 'Defective electric hand tools must not be used. Stop what you are doing and inform your supervisor.',
                'options' => [
                    ['text' => 'Pour water over it', 'is_correct' => false],
                    ['text' => 'Use a CO2 extinguisher', 'is_correct' => false],
                    ['text' => 'Switch it off and report it', 'is_correct' => true],
                    ['text' => 'Stop work for 30 minutes', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'How often should user (visual) checks be carried out on portable electrical equipment?',
                'explanation' => 'All items of portable electrical equipment should be visually checked for safety by the user before being put into use.',
                'options' => [
                    ['text' => 'Every time you use it', 'is_correct' => true],
                    ['text' => 'Every day', 'is_correct' => false],
                    ['text' => 'Once a week', 'is_correct' => false],
                    ['text' => 'At least once a year', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What is the preferred nominal voltage for portable hand lamps for general use on construction sites?',
                'explanation' => '110 volt reduced low voltage systems are strongly preferred for the supply to such equipment.',
                'options' => [
                    ['text' => '110 volts', 'is_correct' => true],
                    ['text' => '150 volts', 'is_correct' => false],
                    ['text' => '230 volts', 'is_correct' => false],
                    ['text' => '400 volts', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What is the preferred nominal voltage for portable hand tools on construction sites?',
                'explanation' => '110 volt reduced low voltage systems are strongly preferred for the supply to such equipment.',
                'options' => [
                    ['text' => '12 volts', 'is_correct' => false],
                    ['text' => '24 volts', 'is_correct' => false],
                    ['text' => '110 volts', 'is_correct' => true],
                    ['text' => '230 volts', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What is the preferred nominal voltage for local lighting up to 2 kW on construction sites?',
                'explanation' => '110 volt reduced low voltage systems are strongly preferred for the supply to such equipment.',
                'options' => [
                    ['text' => '55 volts', 'is_correct' => false],
                    ['text' => '110 volts', 'is_correct' => true],
                    ['text' => '400 volts', 'is_correct' => false],
                    ['text' => '230 volts', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What is the recommended maximum voltage for portable hand lamps when working in confined or damp locations?',
                'explanation' => 'Where the environment is damp, or restricting and conductive, the magnitude of any electric shock will be higher than under normal conditions. Hand lamps in such locations should therefore be supplied from a SELV (separated extra-low voltage) system, i.e. having a maximum voltage of 50 volts and which is electrically separated from earth.',
                'options' => [
                    ['text' => '50 volts', 'is_correct' => true],
                    ['text' => '110 volts', 'is_correct' => false],
                    ['text' => '230 volts', 'is_correct' => false],
                    ['text' => '400 volts', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'If you only have a mains voltage (230 V) hand drill and you want to use it on a construction site which only has yellow (110 V) socket-outlets, what should you do?',
                'explanation' => 'Electrical equipment must not be modified or operated at voltages other than their design voltage.',
                'options' => [
                    ['text' => 'Use a transformer to boost the voltage', 'is_correct' => false],
                    ['text' => 'Cut the plug off and fit a yellow one instead', 'is_correct' => false],
                    ['text' => 'Obtain a 110 V drill or a cordless one for the work', 'is_correct' => true],
                    ['text' => 'Make up an extension cable with a yellow plug on one end and a standard socket on the other end', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'What is most commonly used to reduce 230 volts to 110 volts on site?',
                'explanation' => 'A transformer, usually coloured yellow, will transform 230 volts (mains voltage) down to a relatively safe 110 volts.',
                'options' => [
                    ['text' => 'Residual current device', 'is_correct' => false],
                    ['text' => 'Transformer', 'is_correct' => true],
                    ['text' => 'Circuit breaker', 'is_correct' => false],
                    ['text' => 'Step-down generator', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'When using an extension cable reel, which of the following statements is correct?',
                'explanation' => 'The rating of a partially unreeled extension cable is much lower than when fully unreeled. Overheating of the cable will occur if the rating is exceeded. Care should also be taken to prevent extension cables becoming a tripping hazard.',
                'options' => [
                    ['text' => 'Leave as much as possible coiled up on the reel', 'is_correct' => false],
                    ['text' => 'Uncoil it fully every time', 'is_correct' => false],
                    ['text' => 'Do not exceed the reeled or unreeled rating as appropriate', 'is_correct' => true],
                    ['text' => 'Only uncoil what you need', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'If an extension cable is to be run across a site road, what action should you take?',
                'explanation' => "It is essential that the cable is protected from damage caused by passing traffic. A sign will warn road traffic of the ramp.",
                'options' => [
                    ['text' => 'Throw wooden boards over it', 'is_correct' => false],
                    ['text' => "Place a rubber protection ramp over it and put up a sign stating 'Ramp Ahead'", 'is_correct' => true],
                    ['text' => 'Don\'t do anything to protect the cable', 'is_correct' => false],
                    ['text' => 'Lay the cable over wooden boards', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'To operate a powered hand tool you must be:',
                'explanation' => 'There are no general age restrictions in legislation relating to the use of work equipment. Any person using work equipment. however, must be competent to do so, which will require initial and refresher training.',
                'options' => [
                    ['text' => '16 years old or over', 'is_correct' => false],
                    ['text' => '18 years old or over', 'is_correct' => false],
                    ['text' => '21 years old or over', 'is_correct' => false],
                    ['text' => 'Trained and competent', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 8,
                'text' => 'If you are about to use a power tool and discover the guard is missing, you should:',
                'explanation' => 'Visual checks should be carried out before using equipment. Any faults should be reported immediately and rectified before use.',
                'options' => [
                    ['text' => 'Make up a temporary guard yourself', 'is_correct' => false],
                    ['text' => 'Use the tool but try to work quickly', 'is_correct' => false],
                    ['text' => 'Not use the tool until a proper guard has been fitted', 'is_correct' => true],
                    ['text' => 'Use the tool but work carefully and slowly', 'is_correct' => false],
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