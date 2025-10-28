<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section3QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 3,
                'text' => 'What should you ensure if you suffer an injury through a manual handling operation?',
                'explanation' => 'All injuries must be recorded in the company accident book (BI 510).',
                'options' => [
                    ['text' => 'You get paid for the job', 'is_correct' => false],
                    ['text' => 'The injury is recorded', 'is_correct' => true],
                    ['text' => 'You get help and carry on working', 'is_correct' => false],
                    ['text' => 'You take time off work', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Why should a serious accident be reported to the enforcing authority?',
                'explanation' => 'Serious accidents (specified injuries or those resulting in an absence of over 7 days) must be reported to the enforcing authority under the Reporting of Injuries, Diseases and Dangerous Occurrences Regulations (RIDDOR).',
                'options' => [
                    ['text' => 'It helps the site find out what caused it', 'is_correct' => false],
                    ['text' => 'It is a legal requirement', 'is_correct' => true],
                    ['text' => 'So that the site manager can see who is to blame', 'is_correct' => false],
                    ['text' => 'So that the company will be held responsible', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'What immediate action should you take if you suffer an injury through carrying a load?',
                'explanation' => 'All injuries must be recorded in the company accident book (BI 510).',
                'options' => [
                    ['text' => 'Advise your doctor of your injury', 'is_correct' => false],
                    ['text' => 'Tell your supervisor or employer', 'is_correct' => true],
                    ['text' => 'Tell your working companion', 'is_correct' => false],
                    ['text' => 'Carry on working as best you can', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Under RIDDOR, which one of the following must be reported to the enforcing authority?',
                'explanation' => "This is one of a number of reportable 'specified injuries' and must be reported to the enforcing authority under Reporting of injuries. Diseases and Dangerous Occurrences Regulations (RIDDOR).",
                'options' => [
                    ['text' => 'Accidents where the injured person wishes to make a claim', 'is_correct' => false],
                    ['text' => 'Fracture other than to fingers, thumbs or toes', 'is_correct' => true],
                    ['text' => "All 'near misses' even if no one is hurt", 'is_correct' => false],
                    ['text' => 'All accidents causing injury', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which of the following has the power to examine an accident record?',
                'explanation' => 'HSE inspectors have a range of powers, including this one.',
                'options' => [
                    ['text' => 'An HSE inspector', 'is_correct' => true],
                    ['text' => 'An Insurance company', 'is_correct' => false],
                    ['text' => 'A doctor', 'is_correct' => false],
                    ['text' => 'A workmate', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which of the following should be recorded in the accident book following an accident?',
                'explanation' => 'The information to be entered in an accident book (BI 510) includes when and where the accident happened, the name and address and occupation of the person who had the accident and details of how the accident happened and the injuries suffered. The weather conditions would only be included if they contributed to the accident.',
                'options' => [
                    ['text' => 'The date and time the accident occurred', 'is_correct' => true],
                    ['text' => 'Your date of birth', 'is_correct' => false],
                    ['text' => 'The weather conditions', 'is_correct' => false],
                    ['text' => 'Your National Insurance Number', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which one of the following accounts for most accidents each year on construction sites?',
                'explanation' => 'HSE Statistics show clearly that there are more slips, trips and falls than any other types of accident on site.',
                'options' => [
                    ['text' => 'Strikes by moving vehicles', 'is_correct' => false],
                    ['text' => 'Electrocution', 'is_correct' => false],
                    ['text' => 'Trench collapses', 'is_correct' => false],
                    ['text' => 'Slips, trips and falls', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which of the following is NOT classified as a specified injury to a worker under RIDDOR?',
                'explanation' => 'Amputation of an arm, hand, finger, thumb, leg, foot or toe are classified as specified injuries, as are bone fractures other than to fingers, thumbs or toes.',
                'options' => [
                    ['text' => 'A fractured finger', 'is_correct' => true],
                    ['text' => 'A fractured arm', 'is_correct' => false],
                    ['text' => 'Amputation of a finger', 'is_correct' => false],
                    ['text' => 'A broken wrist', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which one of the following should you do if you witness a serious accident on site?',
                'explanation' => 'If the supervisor is aware of an accident he can take steps to prevent a recurrence. The employer also has legal duties to report certain incidents to the enforcing authority.',
                'options' => [
                    ['text' => 'Pretend you saw nothing', 'is_correct' => false],
                    ['text' => 'Say nothing in case you get in trouble', 'is_correct' => false],
                    ['text' => 'Discuss what to do with your workmates', 'is_correct' => false],
                    ['text' => 'Tell your supervisor what you saw happening', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'A workmate tells you that he witnessed an accident the previous day and the victim was taken to hospital. He asks you for advice on what he should do. Do you tell them to:',
                'explanation' => 'If the supervisor is aware of an accident he can take steps to prevent a recurrence. The employer also has legal duties to report certain incidents to the enforcing authority.',
                'options' => [
                    ['text' => 'Speak to the site nurse about what he saw', 'is_correct' => false],
                    ['text' => 'Tell their supervisor that they saw what happened', 'is_correct' => true],
                    ['text' => 'Telephone the hospital to find out how the injured person is', 'is_correct' => false],
                    ['text' => 'Say nothing to anyone in case they get someone in trouble', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'If a person at work suffers an injury (other than a specified injury) due to an accident at work, it is reportable under RIDDOR if they are incapacitated for work for:',
                'explanation' => "An over-seven-day injury is one which is not a specified injury but results in the injured person being away from work or unable to do the full range of their normal duties for more than seven days (including any days they wouldn't normally be expected to work such as weekends, rest days or holidays) not counting the day of the injury itself.",
                'options' => [
                    ['text' => 'Over 1 day', 'is_correct' => false],
                    ['text' => 'Over 7 days', 'is_correct' => true],
                    ['text' => 'Over half a day', 'is_correct' => false],
                    ['text' => 'Over 2 days', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'What must an employer do with their accident records following completion of a construction project?',
                'explanation' => 'Accident records must be kept by an employer for at least three years.',
                'options' => [
                    ['text' => 'They are sent to the Health and Safety Executive', 'is_correct' => false],
                    ['text' => 'They are destroyed on site with other non-essential documents', 'is_correct' => false],
                    ['text' => 'They are kept safe by the employer', 'is_correct' => true],
                    ['text' => "They are sent to the employer's insurance company", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'At work who would you report a dangerous occurrence to?',
                'explanation' => 'Under RIDDOR. an employer has a legal duty to report certain work-related accidents, but to do this they will need to know that an accident has occurred.',
                'options' => [
                    ['text' => 'The emergency services', 'is_correct' => false],
                    ['text' => 'Your supervisor or employer', 'is_correct' => true],
                    ['text' => 'Another employee', 'is_correct' => false],
                    ['text' => 'The client for the project', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Following a reportable dangerous occurrence when must the enforcing authority be informed?',
                'explanation' => 'The enforcing authority must be notified by the quickest practicable means.',
                'options' => [
                    ['text' => 'Within 5 days', 'is_correct' => false],
                    ['text' => 'Within 48 hours', 'is_correct' => false],
                    ['text' => 'Without delay', 'is_correct' => true],
                    ['text' => 'Within 24 hours', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Accidents causing any injury should always be recorded in:',
                'explanation' => 'All accidents should be recorded in the accident book (BI 510).',
                'options' => [
                    ['text' => "The site engineer's day book", 'is_correct' => false],
                    ['text' => "Your employer's accident recording system", 'is_correct' => true],
                    ['text' => 'Your personal diary', 'is_correct' => false],
                    ['text' => "The main contractor's diary", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which one of the following is classified as a reportable occupational disease under RIDDOR?',
                'explanation' => "Certain occupational diseases likely to have been caused or made worse by work are reportable under RIDDOR. This would include occupational asthma where the person's work includes significant or regular exposure to a known respiratory sensitizer.",
                'options' => [
                    ['text' => 'Mental disorder', 'is_correct' => false],
                    ['text' => 'Occupational asthma', 'is_correct' => true],
                    ['text' => 'Amputation', 'is_correct' => false],
                    ['text' => 'Influenza', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'When a person is injured at work, who should enter the details in the accident book?',
                'explanation' => 'This is the procedure for recording accidents internally in the accident book (BI 510).',
                'options' => [
                    ['text' => "The injured person's supervisor", 'is_correct' => false],
                    ['text' => 'The injured person or anyone acting for them', 'is_correct' => true],
                    ['text' => 'The site manager or engineer', 'is_correct' => false],
                    ['text' => 'The site safety manager', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'If you are involved in a minor accident at work, whose duty is it to report it to site management?',
                'explanation' => 'Employers rely on employees to advise them of occurrences at work.',
                'options' => [
                    ['text' => 'Any witness to the accident', 'is_correct' => false],
                    ['text' => 'The police, fire or ambulance who attend', 'is_correct' => false],
                    ['text' => 'It is your own responsibility', 'is_correct' => true],
                    ['text' => 'The site foreman should report it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'You have suffered an accident at work which has made you incapable of your normal work for over 7 days. Which of the following actions MUST be taken by your employer?',
                'explanation' => "An over-seven-day injury is one which is not a specified injury but results in the injured person being away from work or unable to do the full range of their normal duties for more than seven days (including any days they wouldn't normally be expected to work such as weekends, rest days or holidays) not counting the day of the injury itself.",
                'options' => [
                    ['text' => 'The emergency services are asked to attend the site', 'is_correct' => false],
                    ['text' => 'The local hospital is informed', 'is_correct' => false],
                    ['text' => 'The relevant enforcing authority is informed', 'is_correct' => true],
                    ['text' => 'A deduction is made from your wages for days lost', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'The collapse of scaffolding is only notifiable to the enforcing authority as a reportable dangerous occurrence when the scaffolding is which one of the following?',
                'explanation' => 'This is one of the requirements of RIDDOR.',
                'options' => [
                    ['text' => 'Over 15 metres in height', 'is_correct' => false],
                    ['text' => 'Any height', 'is_correct' => false],
                    ['text' => 'Over 10 metres in height', 'is_correct' => false],
                    ['text' => 'Over 5 metres in height', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'If there is a fatal accident on site, when must the Health and Safety Executive be informed?',
                'explanation' => 'The enforcing authority must be notified by the quickest practicable means.',
                'options' => [
                    ['text' => 'Without delay', 'is_correct' => true],
                    ['text' => 'Within 10 days', 'is_correct' => false],
                    ['text' => 'Within 7 days', 'is_correct' => false],
                    ['text' => 'Within 5 days', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Under which of the following circumstances should an accident be recorded in the site\'s accident book?',
                'explanation' => 'An accident causing an injury to an employee at work should be recorded in the accident book (BI 510).',
                'options' => [
                    ['text' => 'When an accident causes damage to plant or equipment', 'is_correct' => false],
                    ['text' => 'Only when a person is injured and will be off work for more than seven days', 'is_correct' => false],
                    ['text' => 'When the injury is serious enough for first aid to be needed', 'is_correct' => false],
                    ['text' => 'When an accident causes injury to an employee while at work', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which of the following have to be entered into the accident book?',
                'explanation' => 'An accident causing an injury to an employee at work should be recorded in the accident book (BI 510).',
                'options' => [
                    ['text' => 'All accidents causing any damage', 'is_correct' => false],
                    ['text' => 'All accidents causing an injury', 'is_correct' => true],
                    ['text' => 'Only accidents causing serious injury', 'is_correct' => false],
                    ['text' => 'Only accidents causing time off work', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Under which of the following circumstances must injury accidents be recorded in the accident book?',
                'explanation' => 'An accident causing an injury to an employee at work should be recorded in the accident book (BI 510).',
                'options' => [
                    ['text' => 'Only if you break a bone', 'is_correct' => false],
                    ['text' => 'Only if you have time off work', 'is_correct' => false],
                    ['text' => 'Any time they occur', 'is_correct' => true],
                    ['text' => 'Only if you need to go to hospital', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'An entry must be made in the accident book when:',
                'explanation' => 'An accident causing an injury to an employee at work should be recorded in the accident book (BI 510).',
                'options' => [
                    ['text' => 'The person has been off sick for over seven days', 'is_correct' => false],
                    ['text' => 'Management thinks it is appropriate', 'is_correct' => false],
                    ['text' => 'An accident causes personal injury to an employee', 'is_correct' => true],
                    ['text' => 'The severity of the accident may result in a compensation claim', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which of the following MUST be recorded in an accident book after you have had an accident?',
                'explanation' => 'The information to be entered in an accident book (BI 510) includes when and where the accident happened, the name, address and occupation of the person who had the accident and details of how the accident happened and the injuries suffered.',
                'options' => [
                    ['text' => 'Your National Insurance number', 'is_correct' => false],
                    ['text' => 'Your date of birth', 'is_correct' => false],
                    ['text' => 'Your occupation', 'is_correct' => true],
                    ['text' => 'Your phone number', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Which of the following can you learn from an accident?',
                'explanation' => 'An accident investigation should not only assess the cause, but also how similar accidents can be prevented in the future.',
                'options' => [
                    ['text' => 'A combination of human error and mechanical failure always causes injury', 'is_correct' => false],
                    ['text' => 'Ideas on how you would prevent it happening again', 'is_correct' => true],
                    ['text' => 'That mechanical failures are most dangerous', 'is_correct' => false],
                    ['text' => 'How human error is always a cause', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Could making an entry in the accident book help you if you later make a claim for compensation?',
                'explanation' => 'This is laid down in Social Security Legislation.',
                'options' => [
                    ['text' => 'Only if it is a serious injury', 'is_correct' => false],
                    ['text' => 'No', 'is_correct' => false],
                    ['text' => 'Only in the event of a fatality', 'is_correct' => false],
                    ['text' => 'Yes', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 3,
                'text' => "Why is it important to report 'near miss' accidents to your employer?",
                'explanation' => "HSE advises that 'near misses' should be investigated to prevent their recurrence.",
                'options' => [
                    ['text' => "It's the law", 'is_correct' => false],
                    ['text' => 'To make the figures look good', 'is_correct' => false],
                    ['text' => 'So lessons can be learned, preventing an accident next time', 'is_correct' => true],
                    ['text' => 'So that someone can be disciplined', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'Who should you report serious accidents to?',
                'explanation' => 'If the supervisor is aware of an accident he can take steps to prevent a recurrence. The employer also has legal duties to report certain incidents to the enforcing authority.',
                'options' => [
                    ['text' => 'Your workmate', 'is_correct' => false],
                    ['text' => 'Your employer or supervisor', 'is_correct' => true],
                    ['text' => 'The police', 'is_correct' => false],
                    ['text' => 'The ambulance service', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'What is the aim of carrying out an accident investigation?',
                'explanation' => 'An accident investigation should not only assess the cause, but also how similar accidents can be prevented in the future.',
                'options' => [
                    ['text' => 'To determine the cause(s) and prevent similar accidents', 'is_correct' => true],
                    ['text' => 'To establish what injuries were sustained', 'is_correct' => false],
                    ['text' => 'To find out who is at fault', 'is_correct' => false],
                    ['text' => 'To establish the cost of any damage incurred', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 3,
                'text' => 'You have witnessed a serious accident on your site and are interviewed by an HSE inspector. You should:',
                'explanation' => 'This is good practice, but it can also be an offence to withhold important information from an inspector.',
                'options' => [
                    ['text' => 'Tell the inspector what your mates said you should say', 'is_correct' => false],
                    ['text' => 'Ask your supervisor what you should say to the inspector', 'is_correct' => false],
                    ['text' => 'Co-operate fully with the inspector and tell them exactly what you saw', 'is_correct' => true],
                    ['text' => "Don't tell them anything", 'is_correct' => false],
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