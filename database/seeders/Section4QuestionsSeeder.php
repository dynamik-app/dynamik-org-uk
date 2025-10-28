<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section4QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 4,
                'text' => 'When working in dusty conditions, what of the following would give the LEAST level of protection?',
                'explanation' => "Protection factors are given in HSE publication HSG53 'Respiratory protective equipment at work - A practical guide'.",
                'options' => [
                    ['text' => 'Compressed airline breathing helmet', 'is_correct' => false],
                    ['text' => 'Positive pressure powered respirator', 'is_correct' => false],
                    ['text' => 'Self-contained breathing apparatus', 'is_correct' => false],
                    ['text' => 'Half mask dust respirator', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'In hot weather which one of the following is correct with regard to safety helmets?',
                'explanation' => 'On construction sites, despite controls being put in place, there will always be situations where a risk of head injury remains. Taking off your helmet would put you at a much greater risk of a head injury and any unauthorised modification would be in breach of legal requirements and could render the helmet next to useless.',
                'options' => [
                    ['text' => 'You can take off your helmet while working inside the building', 'is_correct' => false],
                    ['text' => 'You must continue to wear your helmet', 'is_correct' => true],
                    ['text' => 'You can drill holes in your safety hat for ventilation', 'is_correct' => false],
                    ['text' => 'You do not need to wear your helmet', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'Which one of the following should you do if your personal protective equipment (PPE) is damaged?',
                'explanation' => 'Employees are required to report any defective PPE to their employer (PPE at Work Regulations 1992, Regulation 7).',
                'options' => [
                    ['text' => 'Obtain new equipment when available', 'is_correct' => false],
                    ['text' => 'Report to your Supervisor without delay', 'is_correct' => true],
                    ['text' => 'Reduce the amount of time you use it', 'is_correct' => false],
                    ['text' => 'Carry on working', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'If personal protective equipment (PPE) is defective, what should you do?',
                'explanation' => 'Employees are required to report any defective PPE to their employer (PPE at Work Regulations 1992, Regulation 7).',
                'options' => [
                    ['text' => 'Complain to the Health and Safety Inspector', 'is_correct' => false],
                    ['text' => 'Get your workmate to mend it if possible', 'is_correct' => false],
                    ['text' => 'Report it to your supervisor', 'is_correct' => true],
                    ['text' => 'Repair if possible and continue to use it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'In normal use, what item of PPE is NOT essential for the operator of a cartridge-operated tool, such as a nail gun?',
                'explanation' => 'Wellingtons do not offer protection against the specific risks associated with the use of a cartridge-operated tool, although safety footwear must always be worn when there is a risk of a foot injury.',
                'options' => [
                    ['text' => 'Safety eyewear', 'is_correct' => false],
                    ['text' => 'Hearing protection', 'is_correct' => false],
                    ['text' => 'Wellington boots', 'is_correct' => true],
                    ['text' => 'Safety helmet', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'Can you opt out of wearing personal protective equipment (PPE)?',
                'explanation' => "You cannot legally 'opt out' of being protected from significant risks at work. This includes wearing the necessary PPE.",
                'options' => [
                    ['text' => 'Yes, by informing the site supervisor', 'is_correct' => false],
                    ['text' => 'Yes, by writing officially to your employer', 'is_correct' => false],
                    ['text' => 'No, you cannot opt out', 'is_correct' => true],
                    ['text' => 'Yes, if it is uncomfortable', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'What is the most important item of personal protective equipment (PPE) when working on or near a highway?',
                'explanation' => 'A high visibility vest is the most important of PPE however, the other items of PPE may also be required.',
                'options' => [
                    ['text' => 'Safety footwear', 'is_correct' => false],
                    ['text' => 'Waterproof clothing', 'is_correct' => false],
                    ['text' => 'Hard hat', 'is_correct' => false],
                    ['text' => 'High visibility vest', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'If you are drilling into concrete with a masonry drill, in which one of the following circumstances will you need to wear eye protection?',
                'explanation' => 'Suitable eye protection must always be worn when working with power-driven tools where chippings are likely to fly or abrasive materials could be propelled.',
                'options' => [
                    ['text' => 'Always', 'is_correct' => true],
                    ['text' => 'Only when drilling overhead', 'is_correct' => false],
                    ['text' => 'Only if the drill is bigger than 10mm', 'is_correct' => false],
                    ['text' => 'Not if drilling into the floor', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When must you wear all personal protective equipment (PPE) provided by your employer?',
                'explanation' => 'Under the PPE at Work Regulations 1992, employees must wear PPE as instructed.',
                'options' => [
                    ['text' => 'As instructed by your employer', 'is_correct' => true],
                    ['text' => 'Only if it fits', 'is_correct' => false],
                    ['text' => 'When you want to', 'is_correct' => false],
                    ['text' => 'Only when you need to', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When MUST an employer provide their employees with personal protective equipment (PPE)?',
                'explanation' => 'As required by regulation 4 of the PPE Regulations.',
                'options' => [
                    ['text' => 'When they may be exposed to a risk to their health and safety which cannot be controlled another way', 'is_correct' => true],
                    ['text' => 'Twice a year', 'is_correct' => false],
                    ['text' => 'If the client or main contractor specifies it in the contract', 'is_correct' => false],
                    ['text' => 'Every 5 years', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'What type of eye protection would you wear when using a cartridge-operated tool, such as a nail gun?',
                'explanation' => 'When using a cartridge-operated tool, such as a nail gun, shatter proof goggles should be worn.',
                'options' => [
                    ['text' => 'Impact goggles', 'is_correct' => true],
                    ['text' => 'Sun glasses', 'is_correct' => false],
                    ['text' => 'Safety spectacles', 'is_correct' => false],
                    ['text' => 'Chemical protection glasses', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'Which of the following must your safety helmet comply with to meet with the requirements of the Personal Protective Equipment at Work Regulations?',
                'explanation' => 'An assessment of the suitability of head protection would include consideration of whether it can be adjusted to suit the individual who is to wear it, that it is compatible with the work to be done and that it is comfortable to wear.',
                'options' => [
                    ['text' => 'It can be adjusted to suit your head size', 'is_correct' => true],
                    ['text' => 'It is a good visible colour', 'is_correct' => false],
                    ['text' => 'It has a label with your name on it', 'is_correct' => false],
                    ['text' => 'It is less than 1 year old', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'In which of the following ways should you wear your safety helmet?',
                'explanation' => "Any item of personal protective equipment must be used in accordance with the manufacturer's instructions, which will include how to correctly fit and wear it and what its limitations are.",
                'options' => [
                    ['text' => 'With the peak raised to deflect falling material', 'is_correct' => false],
                    ['text' => 'With the helmet back to front', 'is_correct' => false],
                    ['text' => 'With the peak raised to give good vision', 'is_correct' => false],
                    ['text' => 'Square on your head, properly adjusted', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When an employee has been issued with eye protection, what are their duties under the Personal Protective Equipment at Work Regulations?',
                'explanation' => 'Regulation 10(2) requires that every employee shall use any PPE in accordance with the training and instruction received.',
                'options' => [
                    ['text' => 'To ensure that they are the right type of protector', 'is_correct' => false],
                    ['text' => 'Not to loan the equipment to other operatives', 'is_correct' => false],
                    ['text' => 'To use the protection in accordance with training and instruction', 'is_correct' => true],
                    ['text' => 'To pay for replacement of lost eye protection', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When should you wear safety footwear on site?',
                'explanation' => 'Suitable safety footwear should be worn if there is a risk of injury from objects falling onto the foot or sharp objects, such as nails, penetrating the sole.',
                'options' => [
                    ['text' => 'Only when working on scaffolds', 'is_correct' => false],
                    ['text' => 'When there is a risk of a foot injury', 'is_correct' => true],
                    ['text' => 'Only when working outdoors', 'is_correct' => false],
                    ['text' => 'Only if the site conditions are wet', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'With regard to the use of personal protective equipment (PPE), which one of the following statements is true?',
                'explanation' => 'PPE is there to protect the individual. Wearing PPE does not protect other people nearby.',
                'options' => [
                    ['text' => 'If you do not use the personal protective equipment (PPE) provided you will probably not come to any harm', 'is_correct' => false],
                    ['text' => 'Personal protective equipment (PPE) protects only the user from the dangers present', 'is_correct' => true],
                    ['text' => 'Personal protective equipment (PPE) need only be provided if it is not too expensive', 'is_correct' => false],
                    ['text' => 'Personal protective equipment (PPE) need only be used if it is available', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'Which of the following statements is TRUE when an employer issues personal protective equipment (PPE)?',
                'explanation' => 'Employers cannot charge for PPE such as hard hats, gloves, required by law (and the bulk of PPE is required by law).',
                'options' => [
                    ['text' => 'The employer can charge you for the full cost of it', 'is_correct' => false],
                    ['text' => 'The employer cannot charge you for it', 'is_correct' => true],
                    ['text' => 'The employer can charge you for up to half the cost of it', 'is_correct' => false],
                    ['text' => 'The employer can only charge you for it if you lose or damage it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'Which one of the following must apply to any hard hat provided?',
                'explanation' => 'All PPE should be CE-marked, indicating that it meets the basic health and safety requirements.',
                'options' => [
                    ['text' => 'It is CE or UKCA marked', 'is_correct' => true],
                    ['text' => 'It is less than 5 years old', 'is_correct' => false],
                    ['text' => 'It is less than 1 year old', 'is_correct' => false],
                    ['text' => 'It is less than 2 years old', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When using personal protective equipment (PPE) legally you must do which of the following?',
                'explanation' => 'Interfering with or misusing items provided in the interests of health, safety or welfare is an offence under the HSW Act 1974 (Section 8).',
                'options' => [
                    ['text' => 'Not interfere with it or misuse it', 'is_correct' => true],
                    ['text' => 'Replace it at your own expense if it is damaged', 'is_correct' => false],
                    ['text' => 'Return it to the manufacturer when damaged', 'is_correct' => false],
                    ['text' => 'Clean it properly once a week', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'If it is necessary for an employee to use personal protective equipment, who has a duty to provide it?',
                'explanation' => 'This is a requirement of the PPE at Work Regulations 1992 (Regulation 4).',
                'options' => [
                    ['text' => 'The trade union', 'is_correct' => false],
                    ['text' => 'The employee', 'is_correct' => false],
                    ['text' => 'The employer', 'is_correct' => true],
                    ['text' => 'The principal contractor', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When should a safety helmet be worn on site?',
                'explanation' => 'The circumstances when there is no foreseeable risk of head injury from falling or swinging objects or striking the head against something will be very limited in most construction work.',
                'options' => [
                    ['text' => 'At all times unless there is no foreseeable risk of injury to the head other than by falling', 'is_correct' => true],
                    ['text' => 'When you are out in the open air', 'is_correct' => false],
                    ['text' => 'When walking to and from a place of work', 'is_correct' => false],
                    ['text' => 'Only when something may fall', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'A colleague has drilled holes in the top of their safety helmet because the weather is hot. Is this:',
                'explanation' => 'Interfering with or misusing items provided in the interests of health, safety or welfare is an offence under the HSW Act 1974 (section 8).',
                'options' => [
                    ['text' => 'Acceptable if the holes are small', 'is_correct' => false],
                    ['text' => 'Their choice', 'is_correct' => false],
                    ['text' => 'Acceptable', 'is_correct' => false],
                    ['text' => 'In breach of legal requirements', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'Who has a duty to provide PPE (Personal Protective Equipment) for use by an employee?',
                'explanation' => 'This is a requirement of the PPE at Work Regulations 1992 (Regulation 4).',
                'options' => [
                    ['text' => 'The employer', 'is_correct' => true],
                    ['text' => 'The principal contractor', 'is_correct' => false],
                    ['text' => 'The employee', 'is_correct' => false],
                    ['text' => 'The client', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When would it be appropriate to wear a bump-cap instead of a safety helmet?',
                'explanation' => 'Industrial scalp protectors (bump caps) can protect against striking fixed obstacles, scalping or entanglements. They do not provide suitable protection against falling or swinging objects.',
                'options' => [
                    ['text' => 'When there is no foreseeable risk of injury from falling or swinging objects', 'is_correct' => true],
                    ['text' => 'In warm weather', 'is_correct' => false],
                    ['text' => 'When working in excavations', 'is_correct' => false],
                    ['text' => 'When working on a ladder', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'How can you protect your eyesight while working on site?',
                'explanation' => null,
                'options' => [
                    ['text' => 'By squinting', 'is_correct' => false],
                    ['text' => 'By not looking directly at what you are doing', 'is_correct' => false],
                    ['text' => 'By wearing the correct type of eye protection', 'is_correct' => true],
                    ['text' => 'By wearing sunglasses', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'When is head protection required to be worn on a construction site to comply with the Personal Protective Equipment at Work Regulations?',
                'explanation' => 'If there is no risk of injury to the head, then hard hats are not required by law. However, on construction sites, despite controls being in place, there will almost always be situations where a risk of head injury remains and require head protection to be worn. Site rules will also require the wearing of head protection other than in any designated safe areas.',
                'options' => [
                    ['text' => 'At all times except by those who are self employed', 'is_correct' => false],
                    ['text' => 'Only when you feel like it', 'is_correct' => false],
                    ['text' => 'At all times unless you are working on scaffold', 'is_correct' => false],
                    ['text' => 'At all times unless there is no foreseeable risk of injury to the head other than by falling', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 4,
                'text' => 'Why should a high visibility vest be worn when working on roads?',
                'explanation' => 'Many workers are struck and injured, often seriously, by moving vehicles.',
                'options' => [
                    ['text' => 'So road users and plant operators can see you', 'is_correct' => true],
                    ['text' => 'Because you were told to do so', 'is_correct' => false],
                    ['text' => 'Because it will keep you warm', 'is_correct' => false],
                    ['text' => 'So that your mates can see you', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 4,
                'text' => "When considering what measures to take to protect people's health and safety, PPE should always be regarded as:",
                'explanation' => 'Engineering controls and safe systems of work should always be considered first.',
                'options' => [
                    ['text' => 'The last resort', 'is_correct' => true],
                    ['text' => 'The first line of defence', 'is_correct' => false],
                    ['text' => 'The best way to tackle the job', 'is_correct' => false],
                    ['text' => 'The only practical measure', 'is_correct' => false],
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