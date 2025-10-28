<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section5QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 5,
                'text' => 'Exposure to asbestos fibres may cause which one of the following?',
                'explanation' => 'Breathing in asbestos fibres can also lead to a number of other diseases, including lung cancer and mesothelioma.',
                'options' => [
                    ['text' => 'Dermatitis', 'is_correct' => false],
                    ['text' => 'Asthma', 'is_correct' => false],
                    ['text' => 'Glandular fever', 'is_correct' => false],
                    ['text' => 'Asbestosis', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Asbestos is suspected in the workplace, during renovation do you:',
                'explanation' => 'Competent advice must be sought, to prevent exposure to the worker or others, either at the time, or subsequently.',
                'options' => [
                    ['text' => 'Remove it', 'is_correct' => false],
                    ['text' => 'Paint it', 'is_correct' => false],
                    ['text' => 'Ignore it', 'is_correct' => false],
                    ['text' => 'Seek guidance immediately', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Which of the following statements about asbestos is TRUE?',
                'explanation' => 'All forms of asbestos can cause fatal diseases.',
                'options' => [
                    ['text' => 'Asbestos is not really a hazard to health', 'is_correct' => false],
                    ['text' => 'White asbestos is safe to use', 'is_correct' => false],
                    ['text' => 'All asbestos can be a hazard to health', 'is_correct' => true],
                    ['text' => 'Only brown and blue asbestos are a hazard to health', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'While working you discover material you think could be asbestos. What should you do?',
                'explanation' => 'It is essential to stop work if asbestos is found or suspected, and await competent advice on what to do next.',
                'options' => [
                    ['text' => 'Clear any dust and fragments, put them in a bin then carry on working', 'is_correct' => false],
                    ['text' => 'Inform the site nurse', 'is_correct' => false],
                    ['text' => 'Stop working immediately and report your suspicions to your supervisor', 'is_correct' => true],
                    ['text' => 'Dampen the material to prevent further dust being created, then carry on working', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Can you tell by the smell of a product whether it is likely to cause harm?',
                'explanation' => 'Many harmful substances have no smell.',
                'options' => [
                    ['text' => 'No', 'is_correct' => true],
                    ['text' => 'Only within an enclosed space', 'is_correct' => false],
                    ['text' => 'Yes', 'is_correct' => false],
                    ['text' => 'Only if you have been trained', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'How would you recognise a hazardous substance?',
                'explanation' => 'A supplier of a packaged hazardous substance must include a label on the packaging incorporating one or more hazard symbols alerting users to the dangers posed by the chemical.',
                'options' => [
                    ['text' => 'By a symbol on the container', 'is_correct' => true],
                    ['text' => 'By its smell', 'is_correct' => false],
                    ['text' => 'The colour of the label on the container', 'is_correct' => false],
                    ['text' => 'It will be in a suitable container', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Which of the following does NOT cause skin problems?',
                'explanation' => 'Asbestos is potentially very harmful if inhaled, but does not affect the skin significantly.',
                'options' => [
                    ['text' => 'Bitumens', 'is_correct' => false],
                    ['text' => 'Solvents', 'is_correct' => false],
                    ['text' => 'Asbestos', 'is_correct' => true],
                    ['text' => 'Epoxy resins', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'When an assessment of hazardous substances has been carried out under the COSHH Regulations, the risks and control measures should be explained to:',
                'explanation' => 'All those working with the hazardous substances in question need to know about any risks.',
                'options' => [
                    ['text' => 'The operatives using the substance', 'is_correct' => true],
                    ['text' => 'All employees on site', 'is_correct' => false],
                    ['text' => 'The accounts department', 'is_correct' => false],
                    ['text' => 'The person in charge of the stores', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'If your hands are very dirty, what should you use to get them clean?',
                'explanation' => 'The other substances can remove natural oils from the skin.',
                'options' => [
                    ['text' => 'White Spirit', 'is_correct' => false],
                    ['text' => 'Paraffin', 'is_correct' => false],
                    ['text' => 'Soap and water', 'is_correct' => true],
                    ['text' => 'Thinners', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => "The presence of rats on site creates a risk of catching Weil's disease. What is the EASIEST PRACTICAL MEASURE that you can take to discourage the presence of rats?",
                'explanation' => 'The easiest solution is to avoid leaving food around, since this is what attracts vermin.',
                'options' => [
                    ['text' => 'Avoid leaving scraps of food lying about', 'is_correct' => true],
                    ['text' => 'Lay traps containing rat poison', 'is_correct' => false],
                    ['text' => 'Contact the local Environmental Health Officer', 'is_correct' => false],
                    ['text' => 'Bring a large cat on site', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Why is personal hygiene so important?',
                'explanation' => null,
                'options' => [
                    ['text' => "So you don't smell", 'is_correct' => false],
                    ['text' => 'Because the COSHH regulations require it', 'is_correct' => false],
                    ['text' => "To protect your own and others' health", 'is_correct' => true],
                    ['text' => 'To stop you catching something nasty', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'If you have been handling lead, how is it most likely to get into your blood stream?',
                'explanation' => 'The route into the body is ingestion, normally from lead contamination on the hands.',
                'options' => [
                    ['text' => 'By not wearing safety goggles', 'is_correct' => false],
                    ['text' => 'By not reporting the matter to the HSE', 'is_correct' => false],
                    ['text' => 'By not using the correct safety footwear', 'is_correct' => false],
                    ['text' => 'By not washing your hands before eating', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'The number of toilets provided on site depends on:',
                'explanation' => "Guidance on the provision of welfare facilities is given in HSE publication 'Health and Safety in Construction'.",
                'options' => [
                    ['text' => 'The type of work being completed', 'is_correct' => false],
                    ['text' => 'The ratio of male and female workers on site', 'is_correct' => false],
                    ['text' => 'The duration of the work on site', 'is_correct' => false],
                    ['text' => 'The number of personnel on site', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Which of the following is not required to be provided under the Construction (Design and Management) Regulations?',
                'explanation' => "Guidance on the provision of welfare facilities as required by COM is given in HSE publication 'Health and Safety in Construction'.",
                'options' => [
                    ['text' => 'Toilet facilities', 'is_correct' => false],
                    ['text' => 'Washing facilities', 'is_correct' => false],
                    ['text' => 'Hot food', 'is_correct' => true],
                    ['text' => 'Drinking water', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'The extended use of powered hand-held tools and equipment may lead to which medical condition?',
                'explanation' => 'Hand-arm vibration can cause a range of conditions (including vibration white finger) collectively known as hand-arm vibration syndrome, as well as diseases such as carpal tunnel syndrome.',
                'options' => [
                    ['text' => 'Vibration white finger', 'is_correct' => true],
                    ['text' => "Weil's disease", 'is_correct' => false],
                    ['text' => 'Asbestosis', 'is_correct' => false],
                    ['text' => 'Dermatitis', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'What must your employer do if the daily personal noise exposure is at or exceeds 85 db(A)?',
                'explanation' => 'This is an interim measure under the Control of Noise at Work Regulations 2005 when the daily personal noise exposure is at or exceeds the upper exposure action value of 85 dB(A). Exposure should subsequently be reduced by implementing organizational or technical measures.',
                'options' => [
                    ['text' => 'Provide hearing protection to those employees who ask for it', 'is_correct' => false],
                    ['text' => 'Issue hearing protection to those exposed and ensure that it is worn', 'is_correct' => true],
                    ['text' => 'Tell employees to buy their own hearing protection', 'is_correct' => false],
                    ['text' => 'Report it to the Health and Safety Executive', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'What are the lower and upper action values with regard to daily personal noise exposure, as defined in the Control of Noise at Work Regulations 2005?',
                'explanation' => 'Daily personal noise exposure is the average noise level experienced by an individual over an 8 hour period.',
                'options' => [
                    ['text' => '85 dB(A) and 90 dB(A)', 'is_correct' => false],
                    ['text' => '80 dB(A) and 85 dB(A)', 'is_correct' => true],
                    ['text' => '70 dB(A) and 80 dB(A)', 'is_correct' => false],
                    ['text' => '75 dB(A) and 85dB(A)', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'At or above what level of daily personal noise exposure does an employer have to provide hearing protection if it is requested by an employee?',
                'explanation' => 'This is one of the duties of employers under the Control of Noise at Work Regulations 2005 when the lower exposure action value of 80 dB(A) is reached or exceeded.',
                'options' => [
                    ['text' => '90 dB(A)', 'is_correct' => false],
                    ['text' => '95 dB(A)', 'is_correct' => false],
                    ['text' => '80 dB(A)', 'is_correct' => true],
                    ['text' => '85 dB(A)', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'The effects of damage to your hearing by long-term exposure to high noise levels:',
                'explanation' => 'Hearing damage due to long-term noise exposure is irreversible.',
                'options' => [
                    ['text' => 'Can be corrected by an operation', 'is_correct' => false],
                    ['text' => 'Are permanent', 'is_correct' => true],
                    ['text' => 'Will be reduced when you change jobs', 'is_correct' => false],
                    ['text' => 'Can be reversed to near normal with time', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Hearing protection should be worn:',
                'explanation' => 'Employees must wear hearing protectors when exposed at or above the upper exposure action values and within hearing protection zones.',
                'options' => [
                    ['text' => 'In designated areas', 'is_correct' => true],
                    ['text' => 'In noisy internal areas only', 'is_correct' => false],
                    ['text' => 'At any workplace', 'is_correct' => false],
                    ['text' => 'Only on building sites', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Wearing suitable hearing protection:',
                'explanation' => 'Hearing protection still allows some noise to reach the ear, but, if it has been correctly chosen, will reduce noise levels to an acceptable level.',
                'options' => [
                    ['text' => 'Stops you hearing distracting conversations', 'is_correct' => false],
                    ['text' => 'Stops you hearing all noise', 'is_correct' => false],
                    ['text' => 'Brings noise down to an acceptable level', 'is_correct' => true],
                    ['text' => 'Repairs damaged hearing', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Which of the following is one of the recommended means of protecting your hearing?',
                'explanation' => 'The others are not considered to be suitable types of hearing protection.',
                'options' => [
                    ['text' => 'Rolled tissue paper', 'is_correct' => false],
                    ['text' => 'Cotton wool pads', 'is_correct' => false],
                    ['text' => 'Soft cloth pads', 'is_correct' => false],
                    ['text' => 'Ear defenders', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Which of the following would NOT reduce the risks from hand-arm vibration when using a hammer action tool?',
                'explanation' => 'Where tools require constant or frequent use, rotas will avoid individuals having long exposure to vibration. The use of low-vibration tools and keeping the hands warm in cold conditions will also reduce the risks.',
                'options' => [
                    ['text' => 'Selecting the lowest vibration tool that is suitable and which can do the work efficiently', 'is_correct' => false],
                    ['text' => 'Wearing gloves to keep the hands warm', 'is_correct' => false],
                    ['text' => 'Working as a team to share the work out', 'is_correct' => false],
                    ['text' => 'Making sure one person does all the work with the tool', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 5,
                'text' => "Which of the following animals can carry Weil's disease?",
                'explanation' => "Weil's disease is a serious and sometimes fatal infection that can be transmitted to humans by contact with infected rats. Another form of Leptospirosis infection can be transmitted from cattle to humans.",
                'options' => [
                    ['text' => 'Snake', 'is_correct' => false],
                    ['text' => 'Sheep', 'is_correct' => false],
                    ['text' => 'Rat', 'is_correct' => true],
                    ['text' => 'Pig', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => "You are most likely to catch Weil's disease (Leptospirosis) if you:",
                'explanation' => 'Anyone who is exposed to rat urine is at risk, particularly sewer workers and farmers. Those in contact with canal or river water are also at risk.',
                'options' => [
                    ['text' => 'Work near wet ground, waterways or sewers', 'is_correct' => true],
                    ['text' => 'Work near air conditioning units', 'is_correct' => false],
                    ['text' => 'Fix showers or baths', 'is_correct' => false],
                    ['text' => 'Drink water from a standpipe', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'What should you do if the toilets on your site are continually dirty?',
                'explanation' => 'How often welfare facilities on site require cleaning will depend on the number of people on site and how quickly they get dirty. The person in control of the site should make sure someone is responsible for keeping the facilities clean and tidy.',
                'options' => [
                    ['text' => 'Ignore the problem-its normal on a construction site', 'is_correct' => false],
                    ['text' => 'Make sure you tell someone who can sort it out', 'is_correct' => true],
                    ['text' => 'Find some cleaning materials and clean it up yourself', 'is_correct' => false],
                    ['text' => 'Ask in a nearby cafe or pub if you can use their toilets', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 5,
                'text' => 'Excessive sunlight on bare skin can cause which serious health problem?',
                'explanation' => 'Ultraviolet rays in sunlight can cause sunburn and premature ageing of the skin. The most serious effect, however, is an increased chance of developing skin cancer.',
                'options' => [
                    ['text' => 'Dermatitis', 'is_correct' => false],
                    ['text' => 'Rickets', 'is_correct' => false],
                    ['text' => 'Acne', 'is_correct' => false],
                    ['text' => 'Skin cancer', 'is_correct' => true],
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